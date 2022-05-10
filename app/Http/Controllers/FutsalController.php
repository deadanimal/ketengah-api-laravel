<?php

namespace App\Http\Controllers;

use App\Models\Futsal;
use Illuminate\Http\Request;

class FutsalController extends Controller
{
    public function index()
    {
        $futsal = Futsal::all();

        return response()->json($futsal);
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
