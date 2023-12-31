<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginWithFacebookController extends Controller
{
    public function redirectFacebook()

    
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
        
            // $user = Socialite::driver('facebook')->user();
            $user = Socialite::driver('facebook')->stateless()->user();
            
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->route('home');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('Test123456')
                ]);
        
                Auth::login($newUser);
        
                return redirect()->route('home');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
