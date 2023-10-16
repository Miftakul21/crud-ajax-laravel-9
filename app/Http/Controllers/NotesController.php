<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use Auth;
use DB;


class NotesController extends Controller
{
    public function fetch_notes()
    {
        $data=DB::table('users as a')
            ->select('a.name','b.notes','b.created_at')
            ->join('notes as b', 'b.user_id', '=', 'a.id')
            ->get();
    
        $notes=$data->map(function($notes,$key){
            return [
                'name_user'=>$notes->name,
                'notes_user'=>$notes->notes,
                'created_at'=>explode(' ',$notes->created_at)[0],
            ];
        });

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Data found',
                'data'=>$notes
            ],200); 
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Data not found',
            ],400);
        }
    }

    public function fetch_notes_user()
    {
        $id=Auth::user()->id;
        $data=Note::select('*')
            ->where('user_id',$id)
            ->get();
        
        $notes=$data->map(function($notes,$key){
            return [
                'id_notes'=>$notes->id,
                'user_id'=>$notes->user_id,
                'notes'=>$notes->notes,
                'created_at'=>explode(' ',$notes->created_at)[0],
                'updated_at'=>explode(' ',$notes->updated_at)[0]
            ];
        });

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Data found',
                'data'=>$notes
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Data not found',
            ]);
        }

    }

    public function fetch_notes_id($id)
    {
        $data=Note::select('*')
            ->where('id',$id)
            ->get();
        
        $notes=$data->map(function($notes,$key){
            return [
                'id_notes'=>$notes->id,
                'notes'=>$notes->notes,
                'created_at'=>explode(' ',$notes->created_at)[0],
                'updated_at'=>explode(' ',$notes->updated_at)[0]
            ];
        });

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Data found',
                'data'=>$notes
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Data not found',
            ]);
        }

    }

    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect()->routes('logout');
        }
        
        $user_id=Auth::user()->id;
        $data=Note::create([
            'user_id'=>$user_id,
            'notes'=>$request->notes
        ]);

        if($data){
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

    public function delete($id)
    {
        if(!Auth::check()){
            return redirect()->routes('logout');
        }

        $user_id=Auth::user()->id;
        $data=Note::whereRaw('user_id = ?',[$user_id])
            ->where('id',$id)
            ->delete();

        if($data){
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
        $data=Note::whereRaw('id = ?',[$id])->update([
            'notes'=>$request->notes
        ]);

        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'Successfuly update data'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Failed update data'
            ]);
        }
    }

}