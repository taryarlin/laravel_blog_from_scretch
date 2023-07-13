<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendForgotPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot_password.index');
    }

    public function sendEmail(Request $request)
    {
        $attributes = $request->validate(['email' => 'required|email']);

        $user = User::where('email' ,$attributes['email'])->first();

        if(is_null($user)) {
            return back()->withErrors(['email' => 'Your email cannot be found!']);
        }

        SendForgotPasswordEmail::dispatch($user);

        return back()->with('success', 'Please check your email to reset password!');
    }
}
