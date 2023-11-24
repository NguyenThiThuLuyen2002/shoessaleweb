<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $id_role = UserRole::where('username', $user->username)->value('id_role');

            if ($id_role == 1) {
                return redirect()->route('admin-home-page');
            } elseif ($id_role == 2) {
                return redirect()->route('client_page');
            } else {
                
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

        return redirect()->route('form_login');
    }
}
