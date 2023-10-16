<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class UserController extends Controller
{

    public function data_user()
    {
        $data=User::select('id','name','email','number_phone','role')
            ->where('role','editor')
            ->orWhere('role','admin')
            ->get();

        $user=$data->map(function($user,$key){
            return [
                'user_id'=>$user->id,
                'nama_user'=>$user->name,
                'email_user'=>$user->email,
                'nomor_telepon_user'=>$user->number_phone,
                'role'=>$user->role
            ];
        });

        if($data) {
            return response()->json([
                'success'=>true,
                'message'=>'',
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Oops, something wrong'
            ]);
        }
    }

    public function store(Request $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number_phone'=>$request->number_phone,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);

        if($user) {
            return response()->json([
                'success'=>true,
                'message'=>'Successfuly add data'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Failed add data'
            ],400);
        }
    }

    public function show_user_id($id)
    {
        $data=User::whereRaw('id = ?',[$id])->get();
        $user=$data->map(function($user, $key){
            return [
                'user_id'=>$user->id,
                'nama_user'=>$user->name,
                'email_user'=>$user->email,
                'nomor_telepon_user'=>$user->number_phone,
                'role'=>$user->role
            ];
        });

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Data found',
                'data'=>$user,
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Data not found',
            ],400);
        }    
    }

    public function delete($id)
    {
        $user=User::whereRaw('id = ?',[$id])->delete();
        if($user){
            return response()->json([
                'success'=>true,
                'message'=>'Successfuly delete data'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Failed delete data'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user=User::whereRaw('id = ?',[$id])->update([
            'name'=>$request->nama_user,
            'email'=>$request->email_user,
            'number_phone'=>$request->nomor_telepon_user,
            'role'=>$request->role
        ]);

        if($user){
            return response()->json([
                'success'=>true,
                'message'=>'Successfuly update data'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Faild update data'
            ],400);
        }
    }
}