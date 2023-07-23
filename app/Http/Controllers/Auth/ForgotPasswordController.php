<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Session;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $validation = $status === Password::RESET_LINK_SENT;

        if($validation)
            Session::flash('success', 'Email sent successfully!'); 

        return $validation ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request) {

        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'token' => 'required|string'
        ]);

        $status = Password::reset($credentials, function($user, $password){
            $user->password = bcrypt($password);
            $user->save();

        });

        $validation = $status == Password::PASSWORD_RESET;

        if($validation)
            Session::flash('success', 'Password updated successfully!');

        return $validation
                ? redirect('/')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }

    public function showResetPassword(){
        return view('auth.resetPassword');
    }
}
