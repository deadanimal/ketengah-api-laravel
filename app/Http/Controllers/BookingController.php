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
        $booking = Booking::all();
        foreach($booking as $book){
            if($book->bd_court_id != null){
                $book->jenis = "Badminton Court";
                $badminton = Badminton::select('nama_gelanggang','lokasi')->where('id', $book->bd_court_id)->first();
                $lokasi = Lokasi::where('id',$badminton->lokasi)->first();
                $book->tempat = $lokasi->nama.' '.$badminton->nama_gelanggang;
            }else if($book->dewan_id != null){
                $book->jenis = "Dewan";
                $dewan = Dewan::select('nama','lokasi')->where('id', $book->dewan_id)->first();
                $lokasi = Lokasi::where('id',$dewan->lokasi)->first();
                $book->tempat = $lokasi->nama.' '.$dewan->nama;
            }else if($book->ft_court_id != null){
                $book->jenis = "Futsal Court";
                $futsal = Futsal::select('nama_gelanggang','lokasi')->where('id', $book->ft_court_id)->first();
                $lokasi = Lokasi::where('id',$futsal->lokasi)->first();
                $book->tempat = $lokasi->nama.' '.$futsal->nama_gelanggang;
            }
        }
        
        
        return response()->json($booking);
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

    public function grafbook()
    {
        $d=strtotime("now");
        $from = date("Y-m-d", $d);
        $to = date('Y-m-d', strtotime($from . ' +10 day'));
        $booking = Booking::whereBetween('date_from', [$from, $to])->orderBy('date_from', 'desc')->get();
        // return $booking;
        $res=array();
        foreach($booking as $key => $item){
            $result = new \stdClass();
            $result = $item->date_from;
            array_push($res,$result);
            $limitdate = date('Y-m-d', strtotime($res[0] . ' +7 day'));
            // $limitdate = date('Y-m-d', strtotime($res[0] . ' +7 day'));
            if($item->days > 1){
                for($x = 1; $x <= $item->days; $x++){
                    $result = new \stdClass();
                    $result = date('Y-m-d', strtotime($item->date_from . ' +'.$x.' day'));
                    if($result != $limitdate){
                        array_push($res,$result);
                    }else{
                        break;
                    }
                }
            }
        }
        // return $res;

        usort($res, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });
        $data = (array_count_values($res));
        return response()->json([$data]);
    }
}
