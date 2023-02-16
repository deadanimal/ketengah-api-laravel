<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;

use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    public function index()
    {
        $rumah = Perumahan::all();

        return response()->json($rumah);
    }

    public function store(Request $request)
    {
        // return $request->nama_akaun;
        $client = new \GuzzleHttp\Client();
        try{
            $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/maklumatakaun?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
            $req = $client->request('POST', $link, [
                'form_params' => [
                    'nokp' => $request->no_ic,
                    'noakaun' => $request->no_akaun_rumah
                ]
            ]
            );
            $response = $req->getBody()->getContents();
            $vals = json_decode($response);
            if($vals->status == 'Gagal'){
                return response()->json('2');
            }
        }
        catch(\Exception $e){
            // return response()->json($e);
            return response()->json('1');
        }

        $Perumahan = new Perumahan();
        $Perumahan->user_id = $request->user_id;
        $Perumahan->nama = $request->nama_akaun;
        $Perumahan->nama_pemilik = $vals->nama;
        $Perumahan->no_akaun_rumah = $request->no_akaun_rumah;
        $Perumahan->no_kad_pengenalan = $request->no_ic;
        $Perumahan->bandar = $vals->bandar;
        $Perumahan->no_rumah = $vals->norumah;
        $Perumahan->taman = $vals->taman;
        $Perumahan->kod_kategori = '';
        $Perumahan->kategori = $vals->kategori;
        $Perumahan->kadar_sewa = $vals->kadarsewa;
        $Perumahan->jenis_rumah = $vals->jenisrumah;
        $Perumahan->jumlah_telah_bayar = $vals->telahbayar;
        $Perumahan->jumlah_pinjaman = $vals->pinjaman;
        $Perumahan->jumlah_tunggakan = $vals->tunggakan;
        $Perumahan->tarikh_mula_perjanjian = $vals->tkhmulajanji;
        $Perumahan->tarikh_tamat_perjanjian = $vals->tkhtamatjanji;
        $Perumahan->jumlah_baki = $vals->pinjaman;
        $Perumahan->save();
        return response()->json($Perumahan);
        //     $table->string('no_kad_pengenalan')->nullable();
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $perumahan = Perumahan::findOrFail($id);
        $perumahan->update($request->all());

        return response()->json($perumahan);
    }

   
    public function destroy($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        if ($perumahan) {
            $perumahan->delete();
            return [
                'code'=>200,
                'message'=>'Perumahan berjaya dibuang'
            ];
        }
         return [
                'code'=>500,
                'message'=>'Perumahan gagal dibuang'
            ];

    }
}