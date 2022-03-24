<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notis;

class NotisController extends Controller
{
    public function index()
    {
        $notis = Notis::all();
        
        return response()->json($notis);
    }

   
    public function store(Request $request)
    {
        return $request;
    }

   
    public function show($id)
    {
        $json = '{"id": '.$id.'}';
        $notis = Notis::whereRaw('not JSON_CONTAINS(deleted->"$[*].id", "'.$id.'")')->get();
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
