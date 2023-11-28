<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function formRegister()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $params = $request->validated();
        $params['password'] = bcrypt($params['password']);

        if ($user) {
            // Send email verification notification
            $user->sendEmailVerificationNotification();

            return $this->formVerifyEmail($user->id, sha1($user->getEmailForVerification()));

            // return redirect()->route('form_verify_email', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())])->with('status', 'Registration successful. Please check your email for verification.');
        }
        return redirect()->back()->with([
            'fail' => 'create account fail'
        ]);
    }

    //verify email 
    public function formVerifyEmail($id, $hash)
    {
        // You may want to add some error checking here to handle cases where $id or $hash is not provided or is invalid.
        alert('Please check you email !');
        $user = User::find($id);

        if (!$user) {
            return abort(404); // Handle the case where the user is not found.
        }

        return view('auth.verify-email', ['user' => $user, 'hash' => $hash]);
    }

    public function verifyEmail($id, $hash)
    {
        Log::info("ID: $id, Hash: $hash"); // Log the values

        $user = User::find($id);
        if ($user) {
            $user->sendEmailVerificationNotification();
            return $this->formVerifyEmail($user->id, $hash);
        }
        return redirect()->back()->with([
            'fail' => 'create account fail'
        ]);
    }
    // if ($user && hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
    //     $user->markEmailAsVerified();
    //     event(new \Illuminate\Auth\Events\Verified($user));
    //     return redirect('form-login'); // or wherever you want to redirect after verification
    // } 

    // return abort(404); // or handle invalid verification link as needed


    //--------------------------------------FORGOT PASS------------------
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    //reset form 
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }





    // login

    public function formLogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            if ($user->email_verified_at != NULL) {
                $id_role = User::where('email', $user->email)->value('id_role');
                session()->put('name', $user->name);
                if ($id_role == 1) {
                    return redirect()->route('admin-home-page');
                } elseif ($id_role == 2) {
                    return redirect('/');
                } else {
                }
            } else {
                // Người dùng chưa xác thực email
                auth()->logout(); // Đăng xuất người dùng
                return back()->with('fail', 'Vui lòng xác thực email trước khi đăng nhập.');
            }
        } else {
            return back()->with('fail', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    //test navigate-->delete after--
    public function dashboard_client()
    {
        return view('client.index'); // Thay đổi view tương ứng
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
