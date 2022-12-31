<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

    // function to get admin's data into adminForm
    public function admin_profile($id)
    {
        // selecting specific user_id
        $adminData = DB::select('select * from users where id = ?', [$id]);

        return view('admin_profile')->with(['adminData' => $adminData]);
    }

    // edit admin profile on admin dashboard
    public function adminForm(Request $request, $id)            // DONE
    {
        // validations for input fields
        $validate = $request->validate([
            'avatar' => [''],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
        ]);
        // getting first user_id 
        if ($request->file('avatar') == '') {
            $admin = User::whereId($id)->first();
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            // saving details
            $admin->save();
            return redirect()->back()->with('message', 'Admin edited successfully.');

        } else {
            $request->hasfile('avatar');
            $image = $request->file('avatar');
            $avatarName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $avatarName);

            $admin = User::whereId($id)->first();
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            $admin->avatar = $avatarName;
            $admin->save();
            return redirect()->back()->with('message', 'Admin edited successfully.');

        }
    }
}