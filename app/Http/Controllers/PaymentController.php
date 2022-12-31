<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{

    public function checkout(Request $request)
    {
        try {
            //code...
        
        //  stripe secret key
        Stripe::setApiKey('sk_test_51MGxFrSHwzaCjtwhWcCIqtoKGo5oxIn5b2JLTynAfE1KzlJrI0o772MGKmHPKId4sjH00lYV5u3sd70zUVLxi9x4009ytCHKAv');

        $amount = Cart::where('user_id', Auth::id())->sum('cart_TotalPrice');
        // dd($amount);

        $payment_intent = PaymentIntent::create([
            'description' => 'Online Payment',
            'amount' => $amount * 100,
            'currency' => 'INR',
            'description' => 'Payment From '. Auth::user()->First_Name,
            'payment_method_types' => ['card'],
        ]);

        $intent = $payment_intent->client_secret;

        // To store payments into payment table
        $storePayments = new Payment();
        $storePayments->payment_type = 'online';
        $storePayments->payment_status = 'Hold';
        $storePayments->transaction_no = $payment_intent->id;
        $storePayments->save();

        // To store Orders into order table
        $courseOrders = new Order();
        $courseOrders->user_id = Auth::id();
        $courseOrders->payment_id = $storePayments->id;
        $courseOrders->order_TotalPrice = $amount;
        $courseOrders->order_status = 'HOLD';
        $courseOrders->save();

        $cartCourse = Cart::where('user_id', Auth::id())->get();

        foreach ($cartCourse as $singleCourse) {
            OrderItem::create([
                'order_id' => $courseOrders->id,
                'course_id' => $singleCourse->course_id,
                'orderItem_price' => $singleCourse->cart_TotalPrice,
                'order_status' => 'Sold',
            ]);
        }
        $cartCourse = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartCourse);
        return view('stripe', compact('intent'));
        
        } 
         catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            echo 'Status is:' . $e->getHttpStatus() . '\n';
            echo 'Type is:' . $e->getError()->type . '\n';
            echo 'Code is:' . $e->getError()->code . '\n';
            // param is '' in this case
            echo 'Param is:' . $e->getError()->param . '\n';
            echo 'Message is:' . $e->getError()->message . '\n';
        } catch (\Stripe\Exception\RateLimitException $e) {
            
            return redirect('errors.500');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
           
            return redirect('errors.500');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            
            return redirect('errors.500');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
           
            return redirect('errors.500');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            
            return redirect('errors.500');
        } catch (Exception $e) {
            
            return redirect('errors.500');
        }
    }

    public function afterPayment()
    {
        return view('afterPayment');
    }

    public function payment(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $payments = Payment::where('payment_type', '=', "$search")
                ->orWhere('payment_status', '=', "$search")
                ->orWhere('transaction_no', '=', "$search")
                ->sortable()
                ->paginate(12);
            return view('adminSide_payments')->with(['payments'=> $payments,'search' => $search]);
        }
        else {
            $payments = Payment::sortable()->paginate(13);
            return view('adminSide_payments')->with(['payments'=> $payments ,'search' => $search]);
        }
    }
}
