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
        return response()->json("false");
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function penghargaanview(Request $request)
    {
        $penghargaan = Penghargaan::where('id', $request[0])->first();
        $tempArray = json_decode($penghargaan->viewed);
        $temp = (object)[];
        $temp->id = $request[1];
        array_push($tempArray, $temp);
        $jsonData = json_encode($tempArray);
        $penghargaan->viewed = $jsonData;
        $penghargaan->save();
        return $penghargaan;
    }
}
