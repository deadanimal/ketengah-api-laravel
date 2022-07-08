<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

   
    public function store(Request $request)
    {
        return response()->json($user);
    }

   
    public function show($id)
    {
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return response()->json('Tahniah Akaun Anda Berjaya Diaktifkan Sila Log Masuk Di Aplikasi e-Sisper');
    }

   
    public function update(Request $request, $id)
    {
        // return $request;
        $user = User::where('user_id', $id)->first();
        if($request->type== 'email'){
            $user->email = $request->data;
        }else if ($request->type== 'nohp'){
            $user->no_telefon = $request->data;
        }else if ($request->type== 'pass'){
            $user->password = $request->data;
        }else if ($request->type== 'code'){
            $user->active = 1;
        }
        
        $user->save();
        return response()->json($user);
    }

   
    public function destroy($id)
    {
        //
    }

    public function UserLogin(Request $request)
    {
        $user = User::where('no_telefon',$request->no_telefon)->where('password', $request->password)->first();
        if($user != null){
            $user->role = '1';
            return response()->json($user);
        }else{
            $admin = Admin::where('no_telefon',$request->no_telefon)->where('password', $request->password)->first();
            if($admin != null){
                $admin->role = '2';
                return response()->json($admin);
            }else{
                return response()->json("false");
            }
        }
    }

    public function UserRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->no_ic = $request->no_ic;
        $user->no_telefon = $request->no_telefon;
        $user->alamat = $request->alamat;
        $user->poskod = $request->poskod;
        $user->bandar = $request->bandar;
        $user->negeri = $request->negeri;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->code = random_int(100000, 999999);
        $phone = '0'.$user->no_telefon;

        $date = date('m/d/Y h:i:s a', time());
        $notis = Notis::where('created_at', '>=', $date)->get();
        $tempArray = json_decode($notis->deleted);
        $temp = (object)[];
        $temp->id = $request[1];
        array_push($tempArray, $temp);
        $jsonData = json_encode($tempArray);
        $notis->deleted = $jsonData;
        $notis->save();

        try {
            $mess = 'Akaun e-Sisper anda berjaya didaftarkan. Sila Aktifkan Akaun anda di aplikasi e-Sisper dengan menggunakan kod '.$user->code;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'FlIJxKC0DQ1RF5af9zKL95bsbQ6hEADEDBRO0fnBoFs='
            ])->post('https://mysmsdvsb.azurewebsites.net/api/messages', [
                'keyword' => 'e-Sisper',
                'message' => $mess,
                'msisdn' => $phone
            ]);
        }catch(\Exception $e){
            return '400';
        }
        
        if(isset($response)){
            $user->save();
        }

        return response()->json($user);
    }

    public function ForgotPass(Request $request)
    {
        $user = User::where('no_telefon',$request->phone)->first();
        $code = random_int(100000, 999999);
        $phone = '0'.$request->phone;
        if($user != null){
            $data = 'user';
            $user->password = 'Sisper'.$code;
        }else{
            $admin = Admin::where('no_telefon',$request->phone)->first();
            if($admin != null){
                $data = 'admin';
                $admin->password = 'Sisper'.$code;
            }else{
                return response()->json("tiada");
            }
        }

        try {
            $mess = 'Permohonan set semula password akaun e-Sisper anda telah berjaya. Sila aktifkan akaun anda di aplikasi e-Sisper dengan menggunakan katalaluan :- Sisper'.$code;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'FlIJxKC0DQ1RF5af9zKL95bsbQ6hEADEDBRO0fnBoFs='
            ])->post('https://mysmsdvsb.azurewebsites.net/api/messages', [
                'keyword' => 'e-Sisper',
                'message' => $mess,
                'msisdn' => $phone
            ]);
        }catch(\Exception $e){
            return '400';
        }

        if($data == 'user'){
            if(isset($response)){
                $user->save();
            }
        }else if($data == 'admin'){
            if(isset($response)){
                $admin->save();
            }
        }

        return response()->json('succ');
    }
}
