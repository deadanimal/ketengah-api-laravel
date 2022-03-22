<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

   
    public function store(Request $request)
    {
        return response()->json($user);
    }

   
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

   
    public function update(Request $request, $id)
    {
        // return $request;
        $user = User::where('user_id', $id)->first();
        if($request->type== 'email'){
            $user->email = $request->data;
        }else if ($request->type== 'nohp'){
            $user->no_telefon = $request->data;
        }else if ($request->type== 'pass'){
            $user->password = $request->data;
        }
        
        $user->save();
        return response()->json($user);
    }

   
    public function destroy($id)
    {
        //
    }

    public function UserLogin(Request $request)
    {
        $user = User::where('no_telefon',$request->no_telefon)->where('password', $request->password)->first();
        if($user != null){
            return response()->json($user);
        }else{
            return response()->json("false");
        }
        
    }

    public function UserRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->no_ic = $request->no_ic;
        $user->no_telefon = $request->no_telefon;
        $user->alamat = $request->alamat;
        $user->poskod = $request->poskod;
        $user->bandar = $request->bandar;
        $user->negeri = $request->negeri;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json($user);
    }
}
