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
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function UserLogin(Request $request)
    {
        return $request;
    }

    public function UserRegister(Request $request)
    {
        return $request;
    }
}
