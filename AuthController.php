<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    
    public function login(Request $req){
        if($req->isMethod("post")){
         $data =  $req->validate([
               'email' => ["required", "email"],
                'password' => ["required"],
            ]);
            if(Auth::attempt($data)){
                return redirect()->route("homepage");
            }
            else{
                return redirect()->back()->with("msg", "Incorrect email or password");
            }
        }
        return view("login");
    }

    public function register(Request $req){
        if($req->isMethod("post")){
         $data = $req->validate([
            'name' => ["required", "string"],
            'email' => ["required", "email"],
            'password' => ["required"],
         ]);

         $user = User::create($data);
         return redirect()->route("login");

        }
        return view("register");
    }

    public function lagout()
    {

    }
}
