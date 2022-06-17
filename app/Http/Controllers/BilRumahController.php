<?php

namespace App\Http\Controllers;

use App\Models\BilRumah;
use Illuminate\Http\Request;

class BilRumahController extends Controller
{
    public function index()
    {
        $data = BilRumah::all();

        return response()->json($data);
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
