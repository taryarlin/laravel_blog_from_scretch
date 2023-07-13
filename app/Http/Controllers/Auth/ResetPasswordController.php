<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->hasValidSignature()) {
            return redirect()
                ->route('forgot-password.index')
                ->withErrors(['email' => 'Invalid reset password link.']);
        }

        $user = User::find($request->user_id);

        if(is_null($user)) {
            return redirect()
                    ->route('forgot-password.index')
                    ->withErrors(['email' => 'Your email address cannot be found!']);
        }

        session(['reset_user_id' => $user->id]);

        return view('auth.reset_password.index');
    }

    public function reset(Request $request)
    {
        $attributes = $request->validate(['password' => 'required|confirmed']);

        $user = User::findOrFail(session('reset_user_id'));

        $user->update(['password' => $attributes['password']]);

        session()->forget('reset_user_id');

        return redirect()->route('get.login')->with('success', 'Your password is successfully reset!');
    }
}
