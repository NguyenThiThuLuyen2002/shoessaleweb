<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
 
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $id_role = UserRole::where('username', $user->username)->value('id_role');
            session()->put('username', $user->username);
            if ($id_role == 1) {
                return redirect()->route('admin-home-page');
            } elseif ($id_role == 2) {
                return redirect('');
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
        session()->flush();
        return redirect()->route('login');
    }
   
}
