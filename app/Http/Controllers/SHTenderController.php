<?php

namespace App\Http\Controllers;

use App\Models\SHTender;
use App\Models\User;

use Illuminate\Http\Request;

class SHTenderController extends Controller
{
    public function index()
    {
        $tender = SHTender::all();

        return response()->json($tender);
    }

   
    public function store(Request $request)
    {
        // return $request;
        $Tender = new SHTender();
        $Tender->user_id = $request->user_id;
        $Tender->nama_syarikat = $request->nama_syarikat;
        $Tender->no_rujukan = $request->no_rujukan;
        $Tender->alamat_1 = $request->alamat1;
        $Tender->alamat_2 = $request->alamat2;
        $Tender->poskod = $request->poskod;
        $Tender->bandar = $request->bandar;
        $Tender->negeri = $request->negeri;
        $Tender->save();

        $user = User::find($request->user_id);
        $user->tender = $Tender->id;
        $user->save();

        return $Tender;
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
