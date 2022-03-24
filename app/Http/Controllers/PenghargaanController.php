<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghargaan;

class PenghargaanController extends Controller
{
    public function index()
    {
        $penghargaan = Penghargaan::all();
        
        return response()->json($penghargaan);
    }

   
    public function store(Request $request)
    {
        $penghargaan = new Penghargaan();
        $penghargaan->user_id = $request->user_id;
        $penghargaan->user_name = $request->user_name;
        $penghargaan->penghargaan = $request->penghargaan;
        $penghargaan->save();
        return $penghargaan;
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
