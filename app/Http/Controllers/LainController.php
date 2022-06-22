<?php

namespace App\Http\Controllers;

use App\Models\Lain;
use App\Models\Urusan;
use Illuminate\Http\Request;

class LainController extends Controller
{
    public function index()
    {
        $lain = Lain::all();

        return response()->json($lain);
    }

   
    public function store(Request $request)
    {
        // return $request;
        $Lain = new Lain();
        $Lain->kod_urusan = $request->kod_urusan;
        $Lain->urusan = $request->urusan;
        $Lain->jumlah_bayar = $request->jumlah_bayar;
        $Lain->checked = false;
        $Lain->save();
        return $Lain;
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

    public function laindd()
    {
        $urusan = Urusan::all();

        return response()->json($urusan);
    }
    
}
