<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
        $users=User::paginate(10);
        return view('users.index',compact('users'));
    }

    public function search(Request $request){

        $str=$request->search;

        $users = User::where('name', 'LIKE', '%' . $str . '%')
                     ->orWhere('email', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $users->appends(['users' => $str]);

        return view('users.index',compact('users'));

    }
    

    public function update(Request $request,$id){
        if($request->user_type !=""){

            $usertype = $request->user_type;

            if($usertype=="admin"){
                $usertype="user";
            }
            else if($usertype=="user"){
                $usertype="admin";
            }

            $user = User::findOrFail($id);
            $user->user_type=$usertype;
        
            $user->save();
            return redirect()->route('users.index');

        }

       

        if($request->file('user_photo')!=""){

            $photo_name="";
            if($request->file('user_photo')){
                $photo_name=$request->file('user_photo')->getClientOriginalName();
                $request->file('user_photo')->move(public_path('images'),$photo_name);
            }
            
            $user=User::findOrFail($id);       
            $user->photo=$photo_name;      
            $user->save(); 

        }

        else{
    
            $user=User::findOrFail($id);
            $user->name=$request->new_name;
            $user->email=$request->new_email;
            $user->phone=$request->new_phone;
            $user->address=$request->new_address;

            $user->save();

        }

        return redirect()->route('home');
    
    }

    public function destroy($id){

        $user=User::findOrFail($id);
        if($user->photo!=""){       
            $user->photo->delete();      
            
        }
        else{
            $user->photo=$user_photo;
        }
        return redirect()->route('home');


        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');

    }

}
