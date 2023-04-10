<?php

namespace App\Http\Controllers;

use App\Models\Bayaran;
use App\Models\Transaksi;
use App\Models\BilRumah;
use App\Models\BilPremis;
use App\Models\Resit;

use Illuminate\Http\Request;

class BayaranController extends Controller
{
    public function index()
    {
        $data = Bayaran::all();

        return response()->json($data);
    }

   
    public function store(Request $request)
    {
        $akaun = json_decode($request->akaun);
        if($request->src == 1){
            $res=array();
            foreach ($akaun as $value) {

                $client = new \GuzzleHttp\Client();
                try{
                    $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/bayarrumah?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
                    $req = $client->request('POST', $link, [
                        'form_params' => [
                            'noakaun' => $value->noakaun,
                            'amaun' => $value->amaun,
                            'tarikh' => date("Y-m-d h:i:s"),
                            'norujukan' => 'ONLINE_TEST',
                            'kaedahbayaran' => '02'
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

                $Bayaran = new Bayaran();
                $Bayaran->user_id = $request->userid;
                $Bayaran->noakaun = $value->noakaun;

                if($value->jenis == 'rumah'){
                    $BilRumah = new BilRumah();
                    $BilRumah->perumahan_id = $value->id;
                    $BilRumah->amaun = $value->amaun;
                    $BilRumah->bulan = date('m');
                    $BilRumah->tahun = date('y');
                    $BilRumah->save();
                    $Bayaran->bil_rumah_id = $BilRumah->id;
                    // return $BilRumah;
                }else if($value->jenis == 'premis'){
                    $BilPremis = new BilPremis();
                    $BilPremis->premis_id = $value->id;
                    $BilPremis->amaun = $value->amaun;
                    $BilPremis->bulan = date('m');
                    $BilPremis->tahun = date('Y');
                    $BilPremis->save();
                    $Bayaran->bil_premis_id = $BilPremis->id;
                    // return $BilPremis;
                }
                
                // $Bayaran->booking_id = $request->userid;
                // $Bayaran->st_id = $request->userid;
                $Bayaran->no_ic_pemilik = $value->no_ic_pemilik;
                $Bayaran->amaun = $value->amaun;
                $Bayaran->tarikh_bayaran = date("Y-m-d");
                $Bayaran->status_bayaran = "Berjaya";
                $Bayaran->save();
    
                $Transaksi = new Transaksi();
                $Transaksi->user_id = $request->userid;
                $Transaksi->bayaran_id = $Bayaran->id;
                $Transaksi->jenis_transaksi = $request->jenis_transaksi;
                $Transaksi->card_detail = $request->card_detail;
                $Transaksi->tarikh_transaksi = date("Y-m-d");
                $Transaksi->save();

                $Resit = new Resit();
                $Resit->bayaran_id = $Bayaran->id;
                $Resit->no_cukai = '';
                $Resit->tarikh_resit = date("Y-m-d");
                $Resit->no_resit = $vals->noresit;
                $Resit->tahun = date("Y");
                $Resit->save();

                $result = new \stdClass();
                $result->id = $Bayaran->id;
                $result->noakaun = $value->noakaun;
                $result->no_ic_pemilik = $value->no_ic_pemilik;
                $result->tarikh_resit = $Resit->tarikh_resit;
                $result->no_resit = $vals->noresit;

                array_push($res,$result);
            }    
        }else if($request->src == 2){
            $res=array();
            foreach ($akaun as $value) {

                $client = new \GuzzleHttp\Client();
                try{
                    $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/bayarpelbagai?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
                    $req = $client->request('POST', $link, [
                        'form_params' => [
                            'kodbayaran' => $value->kodbayaran,
                            'amaun' => $value->amaun,
                            'tarikh' => date("Y-m-d h:i:s"),
                            'norujukan' => 'ONLINE_TEST'
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
                    return response()->json('1');
                }

                $Bayaran = new Bayaran();
                $Bayaran->user_id = $request->userid;
                $Bayaran->st_id = $value->kodbayaran;
                $Bayaran->amaun = $value->amaun;
                $Bayaran->tarikh_bayaran = date("Y-m-d");
                $Bayaran->status_bayaran = "Berjaya";
                $Bayaran->save();
    
                $Transaksi = new Transaksi();
                $Transaksi->user_id = $request->userid;
                $Transaksi->bayaran_id = $Bayaran->id;
                $Transaksi->jenis_transaksi = $request->jenis_transaksi;
                $Transaksi->card_detail = $request->card_detail;
                $Transaksi->tarikh_transaksi = date("Y-m-d");
                $Transaksi->save();

                $Resit = new Resit();
                $Resit->bayaran_id = $Bayaran->id;
                $Resit->no_cukai = '';
                $Resit->tarikh_resit = date("Y-m-d");
                $Resit->no_resit = $vals->noresit;
                $Resit->tahun = date("Y");
                $Resit->save();

                $result = new \stdClass();
                $result->id = $Bayaran->id;
                $result->kodbayaran = $value->kodbayaran;
                // $result->no_ic_pemilik = $value->no_ic_pemilik;
                $result->tarikh_resit = $Resit->tarikh_resit;
                $result->no_resit = $vals->noresit;

                array_push($res,$result);
            }
            // return $vals;
        }
        return $res;
    }

   
    public function show($id)
    {
        return response()->json("show");
    }

   
    public function update(Request $request, $id)
    {
        if($request->no_akaun_rumah != null){
            $bayaran = Bayaran::where('user_id', $id)->where('noakaun', $request->no_akaun_rumah)->get();
        }else if($request->no_akaun_premis != null){
            $bayaran = Bayaran::where('user_id', $id)->where('noakaun', $request->no_akaun_premis)->get();
        }
        return $bayaran;
    }

   
    public function destroy($id)
    {
        //
    }

    public function lejar(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        try{
            $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/lejarakaun?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
            $req = $client->request('POST', $link, [
                'form_params' => [
                    'nokp' => $request->no_ic,
                    'noakaun' => $request->noakaun
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

        $result = [];
        foreach ($vals->lejardtl as $value){
            $itemdate = strtotime($value->tarikh);
            if(date("Y", $itemdate) == $request->year) {
                if(date("m", $itemdate) == $request->month){
                    array_push($result,$value);
                }
            }
        }
        return response()->json($result);
    }
}
