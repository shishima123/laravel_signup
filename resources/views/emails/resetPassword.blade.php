<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hello!</h2>

        <div>
            You are receiving this email because we received a password reset request for your account.
            @component('mail::button', ['url' => URL::to('password/reset/' . $passwordReset->token)])
                Reset Password
            @endcomponent
            <br/>

        </div>

    </body>
</html>