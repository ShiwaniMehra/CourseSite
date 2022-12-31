<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\RefundOrder;
use App\Models\ReturnOrder;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    // --------------------------Admin Dashboard functions-----------------------------

    // all users on admin dashboard
    public function adminSide_Users(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $users = User::where('first_name', '=', "$search")
                ->orWhere('last_name', '=', "$search")
                ->orWhere('email', '=', "$search")
                ->orWhere('phone', '=', "$search")
                ->sortable()
                ->paginate(10);
            return view('admin_side_users')->with(['users' => $users, 'search' => $search]);
        } else {
            $users = User::sortable()->paginate(10);
            return view('admin_side_users')->with(['users' => $users, 'search' => $search]);
        }
    }
    public function adminSide_AddUser(Request $request)             // DONE
    {
        $validate = $request->validate([
            'avatar' =>  [''],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:users'],
        ]);

        $role_id = '2';
        $avatar = $request->input('avatar');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');

        $addedUser = array('role_id' => $role_id, 'avatar' => $avatar, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => $password, 'phone' => $phone);

        DB::table('users')->insert($addedUser);

        return redirect()->back()->with('message', 'User Added successfully!!');
    }

    // show specific user on admin dashboard to edit
    public function adminSide_showUser($id)
    {
        $EditUser = DB::select('select * from users where id = ?', [$id]);
        return view('editUsers')->with(['EditUser' => $EditUser]);
    }

    // edit single user at a time on admin dashboard 
                                                                
    public function adminSide_EditUser(Request $request, $id)    //   DONE 
    {
        $validated = $request->validate([
            'avatar' =>  [''],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
        ]);
        if ($request->file('avatar') == '') {
            $EditUsers = User::whereId($id)->first();
            $EditUsers->first_name = $request->input('first_name');
            $EditUsers->last_name = $request->input('last_name');
            $EditUsers->email = $request->input('email');
            $EditUsers->phone = $request->input('phone');

            $EditUsers->save();
            return redirect()->back()->with('message', 'user edited successfully');
        }
        else {
            $request->hasfile('avatar');
            $userImage = $request->file('avatar');
            $userAvatar = time() . '.' . $userImage->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $userImage->move($destinationPath, $userAvatar);

            $EditUsers = User::whereId($id)->first();
            $EditUsers->first_name = $request->input('first_name');
            $EditUsers->last_name = $request->input('last_name');
            $EditUsers->email = $request->input('email');
            $EditUsers->phone = $request->input('phone');
            $EditUsers->avatar = $userAvatar;

            $EditUsers->save();
            return redirect()->back()->with('message', 'profile edited successfully');
        }
    }

    // delete specific user on admin dashboard
    public function adminSide_DeleteUser($id)
    {
        DB::select('delete from users where id = ?', [$id]);
        return redirect()->back()->with('message', 'User Deleted successfully!!');
    }

    public function adminSide_Orders(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $orders = Order::where('order_TotalPrice', '=', "$search")
                ->orWhere('order_status', '=', "$search")
                ->sortable()
                ->paginate(6);
            return view('admin_side_orders')->with(['orders' => $orders, 'search' => $search]);
        } else {
            $orders = Order::with('Payment')->with('User')->sortable()->paginate(6);
            return view('admin_side_orders')->with(['orders' => $orders, 'search' => $search]);
        }
    }

    // show single order to edit on admin dashboard
    public function adminSide_showOrders(Request $request,$id)
    {

        $show_orders = Order::whereId($id)->get();
        return view('admin_side_showOrders')->with(['show_orders' => $show_orders]);
    }

    // edit single order functionality
    public function adminSide_EditOrders(Request $request, $id)
    {
        $validated = $request->validate([
            
            'order_status' => ['required', 'string']
        ]);

        $EditOrder = Order::whereId($id)->first();
        $EditOrder->order_status = $request->input('order_status');
        $EditOrder->save();
        return redirect()->back()->with('message', 'Order edited successfully');
    }

    //  all returned orders page view
    public function adminSide_ReturnedOrders(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $returned_orders = ReturnOrder::where('user_id', '=', "$search")
                ->orWhere('order_id', '=', "$search")
                ->orWhere('refund_id', '=', "$search")
                ->sortable()
                ->paginate(6);
            return view('admin_side_ReturnedOrders')->with(['returned_orders' => $returned_orders, 'search' => $search]);
        } else {
            $returnItem = OrderItem::all();
            $returned_orders = ReturnOrder::sortable()->paginate(6);
            return view('admin_side_ReturnedOrders')->with(['returned_orders' => $returned_orders, 'returnItem' => $returnItem, 'search' => $search]);
        }
    }

    public function adminSide_RefundedOrders(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $refunded = RefundOrder::where('amount', '=', "$search")
                ->orWhere('transaction_no', '=', "$search")
                ->sortable()
                ->paginate(7);
            return view('admin_side_RefundOrders')->with(['refunded' => $refunded, 'search' => $search]);
        } else {
            $refunded = RefundOrder::sortable()->paginate(7);
            return view('admin_side_RefundOrders')->with(['refunded' => $refunded, 'search' => $search]);
        }
    }



    // --------------------------  User Dashboard functions  -----------------------------

    // user profile page on user dashboard
    public function user_profile($id)
    {
        $userData = DB::select('select * from users where id = ?', [$id]);
        return view('user_profile')->with(['userData' => $userData]);
    }

    // edit user Profile on user dashboard
    public function userForm(Request $request, $id)
    {
        $validate = $request->validate([
            'avatar' =>  [''],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
        ]);
        if ($request->file('avatar') == '') {
            $user = User::whereId($id)->first();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');

            $user->save();
            return redirect()->back()->with('message', 'Profile edited successfully.');
        }
        else {
            
            $request->hasfile('avatar');
            $userImage = $request->file('avatar');
            $userAvatar = time() . '.' . $userImage->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $userImage->move($destinationPath, $userAvatar);

            

            $user = User::whereId($id)->first();
            $user->avatar =  $userAvatar;
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');

            $user->save();
            return redirect()->back()->with('message', 'Profile edited successfully.');
        }
    }

    // myorders (show all orders) function
    public function userOrder()
    {
        if (Auth::id()) {
            $MyOrders = Order::where('user_id', Auth::id())->with('User')->with('Payment')->get();
            return view('myOrdersView')->with(['MyOrders' => $MyOrders]);
        } else {
            redirect()->back()->with('If You Want To access this Login First');
        }
    }

    // single myorders view page function
    public function OrderView($id)
    {
        if (Auth::id()) {

            $ViewOrder = OrderItem::where('order_id', $id)->with('Order')->with('Course')->get();
            return view('singleOrderView')->with(['ViewOrder' => $ViewOrder]);
        } else {
            redirect()->back()->with('If You Want To access this Login First');
        }
    }

    // return orders
    public function returnOrder($id)
    {
        if (Auth::id()) {
            $returnItem = OrderItem::where('order_id', $id)->with('Order')->with('Course')->get();
            return view('returnOrderPage')->with(['returnItem' => $returnItem]);
        } else {
            redirect()->back()->with('If You Want To access this Login First');
        }
    }

    // refund returned orders
    public function refundOrder($id)
    {
        // dd($id);
        $OrderItemTable = OrderItem::find($id); // Accessing OrderItem Table For Orders id

        $orderTable = Order::find($OrderItemTable->order_id); // Access Order Table For Ordered Order

        $paymentTable = Payment::find($orderTable->payment_id); // Access Payment Table For transaction_no

        $stripe = new \Stripe\StripeClient ('sk_test_51MGxFrSHwzaCjtwhWcCIqtoKGo5oxIn5b2JLTynAfE1KzlJrI0o772MGKmHPKId4sjH00lYV5u3sd70zUVLxi9x4009ytCHKAv');

        $check = $stripe->paymentIntents->retrieve($paymentTable->transaction_no);
        if ($check->amount_received == '0') {
            
            $orderTableUpdate = OrderItem::whereId($id)->first();
            $orderTableUpdate->order_status = 'Refunded';
            $orderTableUpdate->save();

            return redirect('myOrders')->with('message', 'Refund Request For Your order'.$id.' has been Accepted');
        } 
        else {
            
        $refund = $stripe->refunds->create(['payment_intent' => $paymentTable->transaction_no, 'amount' => $OrderItemTable->orderItem_price * 100]);

        // Payment Data Store In Refund Table
        $payment = new RefundOrder();
        $payment->amount = $OrderItemTable->orderItem_price;
        $payment->transaction_no = $refund->id;
        $payment->save();

        // Order Data Store In Return Order Table
        $ReturnOrder = new ReturnOrder;
        $ReturnOrder->user_id = Auth::id();
        $ReturnOrder->order_id = $OrderItemTable->order_id;
        $ReturnOrder->refund_id = $payment->id;
        $ReturnOrder->save();

        // OrderItems Table Update
        $orderTableUpdate = OrderItem::whereId($id)->first();
        $orderTableUpdate->order_status = 'Refunded';
        $orderTableUpdate->save();

        return redirect('myOrders')->with('message', 'Refund Request For Your Course has been Accepted');
        }

    }

}