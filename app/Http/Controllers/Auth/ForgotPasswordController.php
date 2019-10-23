<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PasswordReset;
use App\Events\ResetPassword;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendLinkEmailReset(Request $request)
    {
        $password_reset = new PasswordReset();
        $password_reset->email = $request->email;
        $password_reset->token = Str::random(60);
        $password_reset->save();

        event(new ResetPassword($password_reset));

        // \Mail::to($password_reset->email)->send(new ResetPasswordEmail($password_reset));
        return redirect()->route('password.request')->with(['status' => 'We have e-mailed your password reset link!']);
    }
}
