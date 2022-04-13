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
        foreach ($aduan as $item){
            $KateAduan = KategoriAduan::where('kategori_id',$item->kategori)->where('kerosakan_id',$item->jenis_rosak)->first();
            $item->katedet = $KateAduan;
        }
        
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
        $aduanfirst = Aduan::where('user_id', $request[0])->first();
        if(isset($aduanfirst)){
            $KateAduan = KategoriAduan::where('kategori_id',$aduanfirst->kategori)->where('kerosakan_id',$aduanfirst->jenis_rosak)->first();
            $aduanfirst->kategorilist = $KateAduan;
        }else{
            $aduanfirst = (object)[];
            $aduanfirst->kategorilist = '';
        }
        
        $aduanCount = Aduan::where('user_id', $request[0])->count();
        return [$aduanfirst,$aduanCount];
    }

    public function AduanDD(){
        $KateAduan = KategoriAduan::select('kategori_id','kategori')->distinct()->get();
        $JenisRosak = KategoriAduan::all();
        return [$KateAduan,$JenisRosak];
    }

    public function aduanStatus(Request $request){
        $aduanfirst = Aduan::where('id', $request->id)->first();
        $aduanfirst->status = $request->status;
        // $request->status;
        $aduanfirst->save();
        return $aduanfirst;
    }
}