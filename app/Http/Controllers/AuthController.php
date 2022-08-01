<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);

        //create the user
        $user = User::create([
            'first_name'=>$fields['first_name'],
            'last_name'=>$fields['last_name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password']),
        ]);

        //create token
        $token = $user->createToken('mytoken')->plainTextToken;
        
        $response=[
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 200);
        
    }


    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        //check email
        $user=User::where('email',$fields['emails'])->first();
        //check password
        if(!$user || Hash::check($fields['password'],$user->password)){
            return response([
                "message"=>'invalid credentials',
            ],401);
        }

        //create token
        $token = $user->createToken('mytoken')->plainTextToken;
        
        $response=[
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 200);
        
    }


    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }







}
