<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Badminton;
use App\Models\Dewan;
use App\Models\Futsal;
use App\Models\Alatan;
use App\Models\Lokasi;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $dewan = Booking::all();

        return response()->json($dewan);
    }

   
    public function store(Request $request)
    {
        // return $request;
        $Booking = new Booking();
        $Booking->user_id = $request->user_id;
        $Booking->alat_court_id = $request->alatan;
        $Booking->dewan_id = $request->dewan;
        $Booking->ft_court_id = $request->futsal;
        $Booking->bd_court_id = $request->badminton;
        $Booking->date_from = $request->tarikh_mula;
        $Booking->date_to = $request->tarikh_akhir;
        $Booking->days = $request->days;
        $Booking->hour = $request->hour;
        $Booking->time = $request->masa;
        $Booking->amaun = $request->amaun;
        $Booking->qty = $request->qty;
        $Booking->save();
        return $Booking;
    }

   
    public function show($id)
    {
        $booking = Booking::where('user_id', $id)->get();
        foreach ($booking as $item){
            if($item->bd_court_id != null){
                $namatempahan = Badminton::where('id',$item->bd_court_id)->first();
                $item->namatempahan = 'Badminton '.$namatempahan->nama_gelanggang;
                $item->namatempat = $namatempahan->nama_gelanggang;
                $lokasi = Lokasi::where('id',$namatempahan->lokasi)->first();
                $item->tempat = 'Badminton';
                $item->lokasinama = $lokasi->nama;
            }else if($item->dewan_id != null){
                $namatempahan = Dewan::where('id',$item->dewan_id)->first();
                $item->namatempahan = 'Dewan '.$namatempahan->nama;
                $item->namatempat = $namatempahan->nama;
                $lokasi = Lokasi::where('id',$namatempahan->lokasi)->first();
                $item->tempat = 'Dewan';
                $item->lokasinama = $lokasi->nama;
            }else if($item->ft_court_id != null){
                $namatempahan = Futsal::where('id',$item->ft_court_id)->first();
                $item->namatempahan = 'Futsal '.$namatempahan->nama_gelanggang;
                $item->namatempat = $namatempahan->nama_gelanggang;
                $lokasi = Lokasi::where('id',$namatempahan->lokasi)->first();
                $item->tempat = 'Futsal';
                $item->lokasinama = $lokasi->nama;
            }else if($item->alat_court_id != null){
                $namatempahan = Alatan::where('id',$item->alat_court_id)->first();
                $item->namatempahan = $namatempahan->nama_alatan;
                $item->namatempat = $namatempahan->nama_alatan;
            }
        }
        return $booking;
        // return response()->json("show");
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
