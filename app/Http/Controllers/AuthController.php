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

    // public function login(LoginRequest $request)
    // {
    //     if (Auth::attempt($request->validated())) {
    //         $request->session()->regenerate();

    //         return view('home.homepage');
    //     }

    //     return redirect()->back()->with([
    //         'fail' => 'Login fail'
    //     ]);
    // }



    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();

            // Kiểm tra giá trị của trường id_role
            switch ($user->id_role) {
                case 1:
                    // Nếu id_role là 1, chuyển hướng đến trang admin
                    return redirect()->route('admin-home-page');
                    break;

                case 2:
                    // Nếu id_role là 2, chuyển hướng đến trang client
                    return redirect()->route('client_page');
                    break;

                    // Nếu id_role không phải 1 hoặc 2, bạn có thể xử lý theo cách khác tùy thuộc vào yêu cầu của bạn.

                // default:
                //     // Mặc định, chuyển hướng đến trang homepage
                //     return redirect()->route('home.homepage');
            }
        }

        return redirect()->back()->with([
            'fail' => 'Login fail'
        ]);
    }


    public function dashboard_client()
    {
        return view('client.index'); // Thay đổi view tương ứng
    }

   
}


