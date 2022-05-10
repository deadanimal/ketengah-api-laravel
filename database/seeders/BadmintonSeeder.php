<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Badminton;

class BadmintonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Badminton::truncate();
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT2',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT3',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT4',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT5',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT6',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'10',
            'lokasi'=>'1'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'5',
            'lokasi'=>'2'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'5',
            'lokasi'=>'2'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'5',
            'lokasi'=>'3'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'6',
            'lokasi'=>'4'
        ]);
        Badminton::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'5',
            'lokasi'=>'5'
        ]);
    }
}
