<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12',
        ]);

        $remember = isset($request->remember) && $request->remember == 'on' ? true : false;

        $user = User::where('email', $request->email)->first();

        if(!$user->hasVerifiedEmail()) {
            $this->setResend($user);

            return redirect()->route('get.login')
                ->with('unverified', 'Please verify your email to sign in.');
        }

        if(Auth::attempt($attributes, $remember)) {
            return redirect()->route('posts.index');
        }

        return back()->withErrors(['message' => 'Invalid Credentials!']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('get.login');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
}
