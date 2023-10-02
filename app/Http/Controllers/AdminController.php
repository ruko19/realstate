<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function adminDashboard(): View
    {

        return view('admin.index');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminLogin(): View
    {
        return view('admin.login');
    }


    public function adminProfile(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile', compact('profileData'));
    }

    public function adminProfileStore(Request $request)
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
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin profile update successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function adminChangePassword(): View
    {

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.changes-password', compact('profileData'));
    }


    public function adminUpdatePassword(Request $request)
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
