<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notis;
use App\Models\User;

class NotisController extends Controller
{
    public function index()
    {
        $notis = Notis::all();
        
        return response()->json($notis);
    }

   
    public function store(Request $request)
    {
        $Notis = new Notis();
        $Notis->admin_id = $request->id;
        $Notis->tajuk = $request->tajuk;
        $Notis->keterangan = $request->keterangan;
        $Notis->save();
        return $Notis;
    }

   
    public function show($id)
    {
        $user = User::where('user_id',$id)->first();
        $notis = Notis::whereRaw('not JSON_CONTAINS(deleted->"$[*].id", "'.$id.'")')->whereDate('created_at', '>=', $user->created_at)->get();
        return $notis;
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Request $request, $id)
    {
        
    }

    public function notisview(Request $request)
    {
        $notis = Notis::where('id', $request[0])->first();
        $tempArray = json_decode($notis->viewed);
        $temp = (object)[];
        $temp->id = $request[1];
        array_push($tempArray, $temp);
        $jsonData = json_encode($tempArray);
        $notis->viewed = $jsonData;
        $notis->save();
        return $notis;
    }

    public function softdelete(Request $request)
    {
        $notis = Notis::where('id', $request[0])->first();
        $tempArray = json_decode($notis->deleted);
        $temp = (object)[];
        $temp->id = $request[1];
        array_push($tempArray, $temp);
        $jsonData = json_encode($tempArray);
        $notis->deleted = $jsonData;
        $notis->save();
        return $notis;
    }

    public function notisapi(Request $request){
        $res=array();
        if($request->perumahan != []){
            foreach ($request->perumahan as $value) {

                $client = new \GuzzleHttp\Client();
                try{
                    $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/semaknotis?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
                    $req = $client->request('POST', $link, [
                        'form_params' => [
                            'nokp' => $value['no_kad_pengenalan'],
                            'noakaun' => $value['no_akaun_perumahan']
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
                    return $e;
                    return response()->json('1');
                }
    
                foreach($vals->notis as $item){
                    $result = new \stdClass();
                    $result->tajuk = $vals->noakaun;
                    $result->keterangan = $item->keterangan;
                }
                
    
                array_push($res,$result);
    
            }
        }
        if($request->premis != []){
            foreach ($request->premis as $value) {
                // return $value['no_kad_pengenalan'];
                $client = new \GuzzleHttp\Client();
                try{
                    $link = 'https://sisperv3.ketengah.gov.my/v1/integrasi/semaknotis?token=OAf3v7PIrU9Gk_FQA1HXXcTI82uZ0EZX';
                    $req = $client->request('POST', $link, [
                        'form_params' => [
                            'nokp' => $value['no_kad_pengenalan'],
                            'noakaun' => $value['no_akaun_premis']
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
                    return $e;
                    return response()->json('1');
                }
    
                foreach($vals->notis as $item){
                    $result = new \stdClass();
                    $result->view = false;
                    $result->created_at = date("Y-m-d H:i:s");
                    $result->tajuk = $vals->noakaun;
                    $result->keterangan = $item->keterangan;
                }
                
    
                array_push($res,$result);
    
            }
        }
        
        return $res;
        // $Notis = new Notis();
        // $Notis->admin_id = $request->id;
        // $Notis->tajuk = $request->tajuk;
        // $Notis->keterangan = $request->keterangan;
        // $Notis->save();
    }
}
