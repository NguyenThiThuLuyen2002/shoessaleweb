<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
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

        if($user)
        {
            // return redirect() -> route('admin');
            return redirect()->intended('admin');
        }
        return redirect() -> back() -> with([
            'fail'=> 'create account fail'
        ]);
    }

}
