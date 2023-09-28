<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
