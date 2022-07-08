<?php

namespace App\Http\Controllers;

use App\Models\Premis;

use Illuminate\Http\Request;

class PremisController extends Controller
{
    public function index()
    {
        $premis = Premis::all();

        return response()->json($premis);
    }

    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        try{
            $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/maklumatakaun?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
            $req = $client->request('POST', $link, [
                'form_params' => [
                    'nokp' => $request->no_ic,
                    'noakaun' => $request->no_akaun_premis
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

        $Premis = new Premis();
        $Premis->user_id = $request->user_id;
        $Premis->nama = $request->nama_akaun;
        $Premis->nama_pemilik = $vals->nama;
        $Premis->no_akaun_premis = $request->no_akaun_premis;
        $Premis->no_kad_pengenalan = $request->no_ic;

        $Premis->bandar = $vals->bandar;
        $Premis->taman = $vals->taman;
        $Premis->kadar_sewa = $vals->kadarsewa;
        $Premis->jumlah_telah_bayar = $vals->telahbayar;
        $Premis->jumlah_tunggakan = $vals->tunggakan;
        $Premis->tarikh_mula_perjanjian = $vals->tkhmulajanji;
        $Premis->tarikh_tamat_perjanjian = $vals->tkhtamatjanji;
        $Premis->kod_kategori = '';
        $Premis->kategori = $vals->kategori;

        $Premis->save();
        return response()->json($Premis);
    }

    public function show($id)
    {

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