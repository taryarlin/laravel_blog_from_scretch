<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterNotification;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(UserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            $user->notify(new RegisterNotification());

            $this->setResend($user);

            return redirect()->route('verification.sent');
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
}
