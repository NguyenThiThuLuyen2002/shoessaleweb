<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller 
{
    //
    public function formRegister(){
        return view("users.register");
    }
    
    public function register(RegisterRequest $request){
        $user = User::create($request ->validated());
        $params = $request->validated();
        $params['password'] = bcrypt($params['password']);

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        if($user)
        {
            // return redirect() -> route('admin');
            return redirect('admin')->with('status', 'Registration successful. Please check your email for verification.');
        }
        return redirect() -> back() -> with([
            'fail'=> 'create account fail'
        ]);
    }

//     public function register(RegisterRequest $request)
// {
//     $params = $request->validated();

//     // Thêm kiểm tra mật khẩu và mật khẩu xác nhận
//     if ($params['password'] !== $params['confirmpassword']) {
//         return redirect()->back()->with([
//             'fail' => 'Password and Confirm Password do not match.'
//         ]);
//     }

//     // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
//     $params['password'] = bcrypt($params['password']);

//     $user = User::create($params);

//     if ($user) {
//         return redirect()->intended('admin');
//     }

//     return redirect()->back()->with([
//         'fail' => 'Create account failed.'
//     ]);
// }

   


}
