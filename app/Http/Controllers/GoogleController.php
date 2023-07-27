<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->route('home');
       
            }else{

                $myuser = User::where('email','=', $user->email)->first();

                

               if($myuser['email']!=""){


                    //update google id only
                    $newUser =User::find($myuser['id']);

                    //dd($unewUser);

                    $newUser->google_id=$user->id;
                    $newUser->save();

                   

               }
               else{

                        //create new Account

                    $newUser = User::create([

                            'name' => $user->name,
                            'email' => $user->email,
                            'google_id'=> $user->id,
                            'user_type'=>"user",
                            'phone'=>"none",
                            'address'=>"none",
                            'photo'=>"none",
                            'password' => encrypt('123456dummy')
                            
                            ]);

                      }

                Auth::login($newUser);
      
                return redirect()->route('home');
      
                
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }




}
