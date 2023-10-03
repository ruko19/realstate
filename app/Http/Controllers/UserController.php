<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('frontend.home.index');
    }



    public function userProfile(): View
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userProfile.edit_profile', compact('userData'));
    }



    public function userProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User profile update successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function userLogout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User logout  successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function userChangePassword(): View
    {
        return view('frontend.userProfile.change_password');
    }


    public function userUpdatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        // match old password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old password Does not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        // update new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
