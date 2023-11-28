<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    //
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

   public function reset(Request $request)
{
    try {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    } catch (\Exception $e) {
        // Log or dump the exception for debugging
        dd($e->getMessage());
    }
}


}
