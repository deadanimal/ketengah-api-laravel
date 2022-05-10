<?php

namespace App\Http\Controllers;

use App\Models\Alatan;
use Illuminate\Http\Request;

class AlatanController extends Controller
{
    public function index()
    {
        $alatan = Alatan::all();

        return response()->json($alatan);
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
