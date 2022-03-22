<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $aduan = Aduan::all();

        return response()->json($aduan);
    }

   
    public function store(Request $request)
    {
        return response()->json($user);
    }

   
    public function show($id)
    {
        //
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