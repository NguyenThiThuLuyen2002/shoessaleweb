<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Role;
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
               
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->getId())->first();
       
            if($finduser){
       
                $newUser = User::create([
                    'name' => $user->name->getName(),
                    'email' => $user->email->getEmail(),
                    'google_id'=> $user->id->getId(),
                    'created_at' => Carbon::now(),
                    'updated_at'=> Carbon::now(),
                                   
                ]);
                $user_role = new Role();
                $user_role->id = 2;
                $user_role->save();

            }
            return redirect('');     
      
             
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
