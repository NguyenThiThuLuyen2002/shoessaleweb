<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'account_name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]);
                $user_role = new UserRole();
                $user_role->id_role = 2;
                $user_role->username = $new_user->username;
                $user_role->save();

                session()->put('username', $new_user->username);
            } else {
                session()->put('username', $user->username);
            }
            return redirect('');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
