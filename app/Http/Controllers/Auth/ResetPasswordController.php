<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\PasswordReset;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showResetPasswordForm($token)
    {
        $email_reset = PasswordReset::where('token', $token)->first();
        if ($email_reset->count() > 0) {
            return view('auth.passwords.reset',compact('email_reset'));
        }
        return redirect()->route('password.request')->with(['status' => 'Something wrong']);
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email);
        if ($user->count() > 0) {
            $user->update([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60)
            ]);
            $email_reset = PasswordReset::where('token', $request->token)->delete();

            return redirect()->route('getLogin')->with(['status' => 'Password has changed!']);
        }
        return redirect()->route('password.request')->with(['status' => 'Something wrong']);
    }
}
