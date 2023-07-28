<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12',
        ]);

        // $remember = isset($request->remember) && $request->remember == 'on' ? true : false;

        $user = User::where('email', $request->email)->first();

        if(is_null($user)) {
            return response()->json(['status' => 404, 'message' => 'User not found!']);
        }

        $token = $user->createToken('Blog Token');

        return response()->json(['status' => 200, 'token' => $token->plainTextToken, 'message' => 'Successfully Logged In.']);

        // if(!$user->hasVerifiedEmail()) {
        //     $this->setResend($user);

        //     return redirect()->route('get.login')
        //         ->with('unverified', 'Please verify your email to sign in.');
        // }

        // if(Auth::attempt($attributes, $remember)) {
        //     return redirect()->route('posts.index');
        // }

        // return back()->withErrors(['message' => 'Invalid Credentials!']);
    }
}
