<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\KategoriAduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    
    public function index()
    {
        $aduan = Aduan::all();
        
        return response()->json($aduan);
    }

   
    public function store(Request $request)
    {
        $Aduan = new Aduan();
        $Aduan->user_id = $request->id;
        $Aduan->kategori = $request->kategori;
        $Aduan->jenis_rosak = $request->rosak;
        $Aduan->catatan = $request->catatan;
        $Aduan->status = 'TIADA';
        $Aduan->save();
        return $Aduan;
    }

   
    public function show($id)
    {
        $aduans = Aduan::where('user_id', $id)->orderBy('created_at','ASC')->get();
        foreach ($aduans as $aduan){
            $KateAduan = KategoriAduan::where('kategori_id',$aduan->kategori)->where('kerosakan_id',$aduan->jenis_rosak)->first();
            $aduan->kategorilist = $KateAduan;
        }
        return $aduans;
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function AduanFirst(Request $request){
        $aduanfirst = Aduan::where('user_id', $request[0])->orderBy('created_at','DESC')->first();
        $KateAduan = KategoriAduan::where('kategori_id',$aduanfirst->kategori)->where('kerosakan_id',$aduanfirst->jenis_rosak)->first();
        $aduanfirst->kategorilist = $KateAduan;
        $aduanCount = Aduan::where('user_id', $request[0])->count();
        return [$aduanfirst,$aduanCount];
    }

    public function AduanDD(){
        $KateAduan = KategoriAduan::select('kategori_id','kategori')->distinct()->get();
        $JenisRosak = KategoriAduan::all();
        return [$KateAduan,$JenisRosak];
    }
}