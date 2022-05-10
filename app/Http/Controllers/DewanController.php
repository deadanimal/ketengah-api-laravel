<?php

namespace App\Http\Controllers;

use App\Models\Dewan;
use Illuminate\Http\Request;

class DewanController extends Controller
{
    public function index()
    {
        $dewan = Dewan::all();

        return response()->json($dewan);
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
