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
}
