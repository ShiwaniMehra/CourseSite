<?php

use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return view('index');
    }
);

Auth::routes();


//             -------------------   AdminMiddleware   ------------------------

Route::prefix('/')->middleware(['auth', 'isAdmin'])->group(function () {

    // home route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    // To edit admin_profile on admin dashboard
    Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'admin_profile']);

    // To and show admin_profile on admin dashboard
    Route::post('/admin/{id}', [App\Http\Controllers\AdminController::class, 'adminForm']);



    //              -------------------CourseController COURSES------------------------

    // To access all courses on new page on admin dashboard
    Route::get('courses', [App\Http\Controllers\CourseController::class, 'adminSide_Courses']);

    // To show course in form fields on admin dashboard
    Route::get('courses/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_showCourse']);

    // To edit courses on admin dashboard
    Route::post('courses/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_EditCourse']);

    // To delete courses on admin dashboard
    Route::get('courses/delete/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_DeleteCourse']);

    // To add new courses on admin dashboard
    Route::post('courses', [App\Http\Controllers\CourseController::class, 'adminSide_AddCourses']);

    // To view single course on admin dashboard
    Route::get('courses/view/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_ViewCourse']);


    //                 -------------------CourseController  TOPICS------------------------

    // To access all topics on a page
    Route::get('topics', [App\Http\Controllers\CourseController::class, 'adminSide_Topics']);

    // To show course in form fields
    Route::get('topics/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_showTopics']);

    // To edit courses on admin dashboard
    Route::post('topics/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_EditTopics']);

    // To delete courses on admin dashboard
    Route::get('topics/delete/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_DeleteTopics']);

    // To add new topics on admin dashboard
    Route::post('topics', [App\Http\Controllers\CourseController::class, 'adminSide_AddTopics']);



    //       -------------------CourseController Course Sub Category  ------------------------

    // To access all Course Sub Categories on page
    Route::get('CourseSubCat', [App\Http\Controllers\CourseController::class, 'adminSide_CourseSubCat']);

    // To show Course Sub Category in form fields
    Route::get('CourseSubCat/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_showCourseSubCat']);

    // To edit Course Sub Category
    Route::post('CourseSubCat/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_EditCourseSubCat']);

    // To delete Course Sub Category
    Route::get('CourseSubCat/delete/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_DeleteCourseSubCat']);

    // To add new Course Sub Category
    Route::post('CourseSubCat', [App\Http\Controllers\CourseController::class, 'adminSide_AddCourseSubCat']);



    //         -------------------   CourseController Course Category    ------------------------

    // courseController access all CourseCat on new page
    Route::get('CourseCat', [App\Http\Controllers\CourseController::class, 'adminSide_CourseCat']);

    // To show Course Category in form fields
    Route::get('CourseCat/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_showCourseCat']);

    // To edit Course Category
    Route::post('CourseCat/edit/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_EditCourseCat']);

    // To delete Course Category
    Route::get('CourseCat/delete/{id}', [App\Http\Controllers\CourseController::class, 'adminSide_DeleteCourseCat']);

    // To add new Course Category
    Route::post('CourseCat', [App\Http\Controllers\CourseController::class, 'adminSide_AddCourseCat']);



    //         -------------------   PaymentController for admin dashboard   ------------------------

    // To access payments on admin dashboard
    Route::get('payments', [App\Http\Controllers\PaymentController::class, 'payment']);



    //       -------------------     UserController for admin dashboard    ------------------------


    // To edit admin 
    Route::post('users/{id}', [App\Http\Controllers\UserController::class, 'adminSide_EditAdmin']);

    // To access all users on admin dashboard
    Route::get('users', [App\Http\Controllers\UserController::class, 'adminSide_Users']);

    // To add users on admin dashboard
    Route::post('users', [App\Http\Controllers\UserController::class, 'adminSide_AddUser']);

    // To delete users on admin dashboard
    Route::get('users/delete/{id}', [App\Http\Controllers\UserController::class, 'adminSide_DeleteUser']);

    // To show users on admin dashboard
    Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'adminSide_showUser']);

    // To edit users on admin dashboard
    Route::post('users/edit/{id}', [App\Http\Controllers\UserController::class, 'adminSide_EditUser']);

    // To edit users on admin dashboard
    Route::get('AllOrders', [App\Http\Controllers\UserController::class, 'adminSide_Orders']);

    // show single order to edit on admin dashboard 
    Route::get('AllOrders/edit/{id}', [App\Http\Controllers\UserController::class, 'adminSide_showOrders']);

    // To edit users on admin dashboard
    Route::post('AllOrders/edit/{id}', [App\Http\Controllers\UserController::class, 'adminSide_EditOrders']);

    // To edit users on admin dashboard
    Route::get('ReturnedOrders', [App\Http\Controllers\UserController::class, 'adminSide_ReturnedOrders']);

    // // To edit users on admin dashboard
    // Route::get('RefundedOrders', [App\Http\Controllers\UserController::class, 'adminSide_RefundedOrders']);


});

//        -------------------    (UserController) Middleware for user dashboard   ------------------------


Route::prefix('/')->middleware(['auth', 'isUser'])->group(function () {

    // user_profile page route on user dashboard
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'user_profile']);

    // edit user_profile route on user dashboard
    Route::post('/user/{id}', [App\Http\Controllers\UserController::class, 'userForm']);

});

//          -------------------   DashboardController for Front-end Dashboard    ------------------------

Route::group([], function () {

    // all courses on user dashboard
    Route::get('course', [App\Http\Controllers\DashboardController::class, 'IndexCourse']);

    // user's orders on user dashboard 
    Route::get('myOrders', [App\Http\Controllers\UserController::class, 'userOrder']);

    // user's order page view button on user dashboard
    Route::get('courseItem/{id}', [App\Http\Controllers\UserController::class, 'OrderView']);

    // aboutUs page on user dashboard
    Route::get('aboutUs', [App\Http\Controllers\DashboardController::class, 'IndexAbout']);

    // single course view on user dashboard
    Route::get('SingleCourse/view/{id}', [App\Http\Controllers\DashboardController::class, 'ViewSingleCourse']);

});

//    -------------------  Middleware to check if user is loggedIn 

//    ------------------------  CartController

Route::middleware(['auth'])->group(function () {

    // cart page route (all cart items on cart page)
    Route::get('cart', [App\Http\Controllers\CartController::class, 'cart']);

    // navbar cart count and increment functionality
    Route::get('cartNum', [App\Http\Controllers\CartController::class, 'cartCount']);

    // add to cart functionality
    Route::get('add_to_cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);

    // cart update (add or delete items)
    Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update.cart');

    // remove courses from cart
    Route::get('removeCourse/{id}', [App\Http\Controllers\CartController::class, 'remove']);

    // cart page to Checkout page route
    Route::get('payment', [App\Http\Controllers\CartController::class, 'CourseCheckout']);

    // checkout page to payment gateway route
    Route::get('checkout', [App\Http\Controllers\PaymentController::class, 'checkout']);

    // after payment message page route
    Route::post('checkout', [App\Http\Controllers\PaymentController::class, 'afterPayment']);

    // return order button and functionality
    Route::get('return/{id}', [App\Http\Controllers\UserController::class, 'returnOrder']);

    // refund order button and functionality
    Route::get('refund/{id}', [App\Http\Controllers\UserController::class, 'refundOrder']);

});