<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show all user
    public function index()
    {
        $Users = User::all();
        return view('pages.user.indexUser', ['users' => $Users]);
    }

    // show edit user data pages
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.editUser', ['user' => $user]);
    }

    //updating user data
    public function update(Request $request, $id)
    {
        // Get current user
        $user = User::findOrFail($id);

        // Validate the data submitted by user
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:225|' . Rule::unique('users')->ignore($user->id),
        ]);

        // if fails redirects back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Fill user model
        $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ]);

        // Save user to database
        $user->save();

        // Redirect to user
        return redirect('/user');
    }

    // show reset password user data pages
    public function resetpass($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.resetpassUser', ['user' => $user]);
    }

    // reset password user 
    public function updatepass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:password',
        ]);

        // if fails redirects back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::findOrFail($request->id)->update(['password' => Hash::make($request->password)]);
        return redirect('/user');
    }

    // delete user
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/user');
    }
}
