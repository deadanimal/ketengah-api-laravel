<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Notis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

    // public function store(Request $request)
    // {
    //     return response()->json($user);
    // }

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
        if ($request->type == 'email') {
            $user->email = $request->data;
        } else if ($request->type == 'nohp') {
            $user->no_telefon = $request->data;
        } else if ($request->type == 'pass') {
            $user->password = $request->data;
        } else if ($request->type == 'code') {
            $user->active = 1;
        }

        $user->save();
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::where('user_id', $id)->first();
        if ($user) {
            $user->delete();
            return [
                'code' => 200,
                'massage' => 'User berjaya dihapuskan',
            ];
        }

        return [
            'code' => 500,
            'massage' => 'User tidak wujud',
        ];
    }

    public function UserLogin(Request $request)
    {
        $user = User::where('no_telefon', $request->no_telefon)->where('password', $request->password)->first();
        if ($user != null) {
            $user->role = '1';
            return response()->json($user);
        } else {
            $admin = Admin::where('no_telefon', $request->no_telefon)->where('password', $request->password)->first();
            if ($admin != null) {
                $admin->role = '2';
                return response()->json($admin);
            } else {
                return response()->json("false");
            }
        }
    }

    public function UserRegister(Request $request)
    {
        $checkphoneno = User::where('no_telefon', $request->no_telefon)->first();
        if ($checkphoneno) {
            return [
                'code' => 500,
                'massage' => "Nombor Telefon Ini Sudah Didaftarkan pada pengguna lain, Sila semak semula Nombor Telefon Anda",
            ];
        }

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
        $phone = '0' . $user->no_telefon;

        $date = date('m/d/Y h:i:s a', time());
        $notis = Notis::where('created_at', '>', $date)->get();
        if ($notis != null) {
            foreach ($notis as $item) {
                $tempArray = json_decode($item->deleted);
                $temp = (object) [];
                $temp->id = $request[1];
                array_push($tempArray, $temp);
                $jsonData = json_encode($tempArray);
                $item->deleted = $jsonData;
                $item->save();
            }
        }

        try {
            $mess = 'Akaun e-Sisper anda berjaya didaftarkan. Sila Aktifkan Akaun anda di aplikasi e-Sisper dengan menggunakan kod ' . $user->code;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'FlIJxKC0DQ1RF5af9zKL95bsbQ6hEADEDBRO0fnBoFs=',
            ])->post('https://mysmsdvsb.azurewebsites.net/api/messages', [
                'keyword' => 'e-Sisper',
                'message' => $mess,
                'msisdn' => $phone,
            ]);
        } catch (\Exception$e) {
            return '400';
        }

        if (isset($response)) {
            $user->save();
        }

        return response()->json($user);
    }

    public function ForgotPass(Request $request)
    {
        $user = User::where('no_telefon', $request->phone)->first();
        $code = random_int(100000, 999999);
        $phone = '0' . $request->phone;
        if ($user != null) {
            $data = 'user';
            $user->password = 'Sisper' . $code;
        } else {
            $admin = Admin::where('no_telefon', $request->phone)->first();
            if ($admin != null) {
                $data = 'admin';
                $admin->password = 'Sisper' . $code;
            } else {
                return response()->json("tiada");
            }
        }

        try {
            $mess = 'Permohonan set semula password akaun e-Sisper anda telah berjaya. Sila aktifkan akaun anda di aplikasi e-Sisper dengan menggunakan katalaluan :- Sisper' . $code;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'FlIJxKC0DQ1RF5af9zKL95bsbQ6hEADEDBRO0fnBoFs=',
            ])->post('https://mysmsdvsb.azurewebsites.net/api/messages', [
                'keyword' => 'e-Sisper',
                'message' => $mess,
                'msisdn' => $phone,
            ]);
        } catch (\Exception$e) {
            return '400';
        }

        if ($data == 'user') {
            if (isset($response)) {
                $user->recurring = 1;
                $user->save();
            }
        } else if ($data == 'admin') {
            if (isset($response)) {
                $admin->save();
            }
        }

        return response()->json('succ');
    }

    public function all_users()
    {
        $user_count = User::all()->count();
        return response()->json($user_count);
    }

    public function FirstLoginChangePassword($id, Request $request)
    {
        $user = User::where('user_id', $id)->first();
        if ($user) {
            User::where('user_id', $id)->update([
                'password' => $request->password,
                'recurring' => true,
            ]);
            return response()->json(User::where('user_id', $id)->first());
        }

        return [
            'code' => 500,
            'massage' => 'User tidak wujud',
        ];
    }

    public function SearchPenggunaByName(Request $request)
    {
        $users = User::where('name', 'LIKE', '%' . $request->name . '%')->get();
        return response()->json($users);
    }

}
