<?php

namespace App\Http\Controllers;

use App\Models\Premis;

use Illuminate\Http\Request;

class PremisController extends Controller
{
    public function index()
    {
        $premis = Premis::all();

        return response()->json($premis);
    }

    public function store(Request $request)
    {
        return response()->json($request);
    }

    public function show($id)
    {

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