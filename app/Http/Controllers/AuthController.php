<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('user/login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
            switch ($user->id_role) { // Kiểm tra giá trị của trường id_role
                case 1:
                    // Nếu id_role là 1, chuyển hướng đến trang admin
                    return redirect()->route('admin-home-page');
                    break;

                case 2:
                    // Nếu id_role là 2, chuyển hướng đến trang client
                    return redirect()->route('client_page');
                    break;
            }
        }

        return redirect()->back()->with([
            'fail' => 'Login fail'
        ]);
    }

    //
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
