<?php

namespace App\Http\Controllers;

use App\Models\Course;
use DB;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // this function will show all the items that are stored into cart table 
    public function cart(){
        $cartItems = Cart::all();
        return view('cart', compact('cartItems'));
    }

    //  add  to cart function to add courses into cart table 
    public function addToCart($id)
    {
        // this will find if course id exists or not
        $course = Course::findOrFail($id);
        // if $id matches the cart->course_id or not . And get() will get this id
        $addedCourse = Cart::where('course_id', $id)->get();
        // now we will take this cart into a variable 
        foreach ($addedCourse as $cartCourse)
        {
            // matching cart->course_id with the $id that we are getting after add to cart button click 
            // if this $id already exists in cart that it will return this condition's message
            if ($cartCourse->course_id == $id) 
            {
                return redirect()->back()->with('error', 'This Course is already in your cart ');
            } 
        }
        // if $id doesn't match any course_id that are already exists in cart->course_id than it will save this course into cart
        $cart = new Cart;
        $cart->course_id =$id;
        $cart->cart_TotalPrice = $course->course_price;
        $cart->user_id = Auth::id();
        $cart->save();
        return redirect()->back()->with('message', 'Course added to cart successfully!');

    }
    // remove items from cart
    public function remove($id){
        DB::select('delete from carts where course_id = ?', [$id]);
        return redirect()->back()->with('message', 'Course deleted to cart successfully!');
    }

    // checkout button function
    public function CourseCheckout(){
        $cartData = Cart::where('user_id',Auth::id())->get();
        return view('checkoutPage')->with(['cartData' => $cartData]);
    }

    // cart icon count function
    public function cartCount(){
        $cartData = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartData]);
    }
}
