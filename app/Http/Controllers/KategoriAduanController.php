<?php

namespace App\Http\Controllers;

use App\Models\KategoriAduan;
use Illuminate\Http\Request;

class KategoriAduanController extends Controller
{
    public function index()
    {
        $aduan = KategoriAduan::all();

        return response()->json($aduan);
    }

   
    public function store(Request $request)
    {
        return $request;
    }

   
    public function show($id)
    {
        return response()->json("show");
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
