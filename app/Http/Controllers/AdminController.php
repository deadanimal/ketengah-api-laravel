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
        return $request;
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
