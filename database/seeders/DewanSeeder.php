<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dewan;
use Illuminate\Support\Facades\DB;

class DewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dewans')->truncate();
        Dewan::create([
            'nama'=> 'BALORA',
            'harga'=> '10',
            'lokasi'=> '1',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'DEWAN ORANG RAMAI',
            'harga'=> '10',
            'lokasi'=> '1',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'BALORA',
            'harga'=> '10',
            'lokasi'=> '2',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'DEWAN ORANG RAMAI',
            'harga'=> '10',
            'lokasi'=> '2',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'BALORA',
            'harga'=> '10',
            'lokasi'=> '3',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'BALORA',
            'harga'=> '10',
            'lokasi'=> '4',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'DEWAN ORANG RAMAI',
            'harga'=> '10',
            'lokasi'=> '4',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'BALORA',
            'harga'=> '10',
            'lokasi'=> '5',
            'kod_urusan'=>'1'
        ]);
        Dewan::create([
            'nama'=> 'DEWAN ORANG RAMAI',
            'harga'=> '10',
            'lokasi'=> '5',
            'kod_urusan'=>'1'
        ]);
    }
}
