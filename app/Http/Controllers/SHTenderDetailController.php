<?php

namespace App\Http\Controllers;

use App\Models\SHTenderDetail;

use Illuminate\Http\Request;

class SHTenderDetailController extends Controller
{
    public function index()
    {
        $tender = SHTenderDetail::all();

        return response()->json($tender);
    }

   
    public function store(Request $request)
    {
        $Tender = new SHTenderDetail();
        $Tender->sh_id = $request->sh_id;
        $Tender->urusan = $request->kod_urusan;
        $Tender->harga = $request->jumlah_bayar;
        $Tender->catatan = $request->catatan;
        $Tender->save();

        return $Tender;
    }

   
    public function show($id)
    {
        $tenderdtl = SHTenderDetail::where('sh_id', $id)->orderBy('created_at','ASC')->get();
        return $tenderdtl;
        // return response()->json("show");
    }

   
    public function update(Request $request, $id)
    {
        $tender = SHTenderDetail::where('id', $id)->first();
        $tender->urusan = $request->urusan;
        $tender->harga = $request->harga;
        $tender->catatan = $request->catatan;
        $tender->save();
        return $tender;
    }

   
    public function destroy($id)
    {
        $tender = SHTenderDetail::find($id);
        $tender->delete();
        return $tender;
    }

}
