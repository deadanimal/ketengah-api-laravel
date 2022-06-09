<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;

use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    public function index()
    {
        // $perumahan = Perumahan::all();

        // return response()->json($perumahan);

        $client = new \GuzzleHttp\Client();
        try{
            $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/maklumatakaun?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
            $request = $client->request('POST', $link, [
                'form_params' => [
                    'nokp' => '770510036865',
                    'noakaun' => 'S/A/C/02/652/100'
                ]
            ]
            );
            $response = $request->getBody()->getContents();
            $vals = json_decode($response);
            return $Perumahan;
        }
        catch(\Exception $e){
            dd($e);
            return '400';
        }
    }

    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        try{
            $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/maklumatakaun?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
            $request = $client->request('POST', $link, [
                'form_params' => [
                    'nokp' => '770510036865',
                    'noakaun' => 'S/A/C/02/652/100'
                ]
            ]
            );
            $response = $request->getBody()->getContents();
            $vals = json_decode($response);

            $Perumahan = new Perumahan();
            $Perumahan->user_id = $request->user_id;
            $Perumahan->nama = $request->nama_akaun;
            $Perumahan->no_akaun_rumah = $request->no_akaun_rumah;
            $Perumahan->no_kad_pengenalan = $request->no_ic;

            // $Perumahan->bandar = $vals->bandar;
            // $Perumahan->no_rumah = $vals->norumah;
            // $Perumahan->taman = $vals->taman;
            // $Perumahan->kod_kategori = '';
            // $Perumahan->kategori = $vals->kategori;
            // $Perumahan->kadar_sewa = $vals->kadarsewa;
            // $Perumahan->jenis_rumah = $vals->jenisrumah;
            // $Perumahan->jumlah_telah_bayar = $vals->telahbayar;
            // $Perumahan->jumlah_pinjaman = $vals->pinjaman;
            // $Perumahan->jumlah_tunggakan = $vals->tunggakan;
            // $Perumahan->tarikh_mula_perjanjian = $vals->tkhmulajanji;
            // $Perumahan->tarikh_tamat_perjanjian = $vals->tkhtamatjanji;
            // $Perumahan->jumlah_baki = $vals->pinjaman;
            $Perumahan->save();
            return $Perumahan;
        }
        catch(\Exception $e){
            dd($e);
            return '400';
        }
        return response()->json($request);
        //     $table->string('no_kad_pengenalan')->nullable();
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