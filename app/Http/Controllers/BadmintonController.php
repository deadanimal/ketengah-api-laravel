<?php

namespace App\Http\Controllers;

use App\Models\Badminton;
use Illuminate\Http\Request;

class BadmintonController extends Controller
{
    public function index()
    {
        $badminton = Badminton::all();

        return response()->json($badminton);
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
