<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        
        return response()->json($pengumuman);
    }

   
    public function store(Request $request)
    {
        $Pengumuman = new Pengumuman();
        $Pengumuman->admin_id = $request->admin_id;
        $Pengumuman->tajuk = $request->tajuk;
        $Pengumuman->keterangan = $request->keterangan;
        $Pengumuman->tarikh_mula = $request->tarikh_mula;
        $Pengumuman->tarikh_tamat = $request->tarikh_tamat;
        $Pengumuman->save();
        return $Pengumuman;
    }

   
    public function show($id)
    {
        return $id;
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Request $request, $id)
    {
        
    }

    public function pengumumantempoh()
    {
        $penghargaan = Pengumuman::all();
        return $penghargaan;
    }
}
