<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $penghargaan = Admin::all();
        
        return response()->json($penghargaan);
    }

   
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->no_telefon = $request->no_telefon;
        $admin->password = $request->password;
        $admin->save();
         
        return response()->json($admin);
    }

   
    public function show($id)
    {
        return $id;
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function searchpengguna(Request $request){
        if($request->nophone == null){
            return '';
        }else{
            $user = User::where('no_telefon', 'like', '%' . $request->nophone . '%')->get();
            foreach ($user as $item) {
                $item->jenis = "PENGGUNA";
                if($item->active == 1){
                    $item->check = true;
                }else{
                    $item->check = false;
                }
            }
            return $user;
        }
    }

    public function aktifpengguna(Request $request){
        $user = User::where('user_id', $request->userid)->first();
        if($request->check === 'true'){
            $user->active = 1;
            $user->save();
            return response()->json('1');
        }else{
            $user->active = 0;
            $user->save();
            return response()->json('0');
        }
        // return $request->check;
    }
}
