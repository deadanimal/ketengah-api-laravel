<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $penghargaan = Admin::all();
        
        return response()->json($penghargaan);
    }

   
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->no_telefon = $request->no_telefon;
        $admin->password = $request->password;
        $admin->save();
         
        return response()->json($admin);
    }

   
    public function show($id)
    {
        return $id;
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
