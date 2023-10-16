<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $data=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number_phone'=>$request->number_phone,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Register success'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Register failed'
            ],400);
        }
        
    }

    public function auth_login(Request $request) 
    {
        $email=$request->email;
        $password=$request->password;

        if(Auth::guard('web')->attempt(['email'=>$email, 'password' => $password])) {
            $data=[
                'success'=>true,
                'role'=>Auth::user()->role,
            ];

            return response()->json($data);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Oops, something wrong'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('logout');
    }

}