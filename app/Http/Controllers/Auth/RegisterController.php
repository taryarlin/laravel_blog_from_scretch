<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(UserRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);

        $user->notify(new RegisterNotification());

        $this->setResend($user);

        return redirect()->route('verification.sent');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
}
