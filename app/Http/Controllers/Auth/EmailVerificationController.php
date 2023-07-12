<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterNotification;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        if(!$request->hasValidSignature()) {
            return view('auth.verification.expired');
        }

        $user = User::findOrFail($request->user_id);

        if($user->hasVerifiedEmail()) {
            return redirect()->route('get.login');
        }

        $user->markEmailAsVerified();

        $this->destroyResend();

        return redirect()->route('verification.success');
    }

    public function notice()
    {
        return view('auth.verification.notice');
    }

    public function sent()
    {
        return view('auth.verification.sent');
    }

    public function resend()
    {
        $user = User::findOrFail(session('resend')['id']);

        $user->notify(new RegisterNotification());

        return redirect()->route('verification.sent');
    }

    public function success()
    {
        return view('auth.verification.success');
    }

    private function destroyResend()
    {
        session()->forget('resend');
    }
}
