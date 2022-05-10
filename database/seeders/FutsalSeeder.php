<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Futsal;

class FutsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Futsal::truncate();
        Futsal::create([
            'nama_gelanggang'=> 'COURT1',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'30',
            'lokasi'=>'1'
        ]);
        Futsal::create([
            'nama_gelanggang'=> 'COURT2',
            'kod_urusan'=> '1',
            'kod_sub_urusan'=> '1',
            'harga'=>'30',
            'lokasi'=>'1'
        ]);
    }
}
