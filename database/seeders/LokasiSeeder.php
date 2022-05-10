<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'nama'=> 'AMBS (HQ)'
        ]);
        Lokasi::create([
            'nama'=> 'BUKIT BESI'
        ]);
        Lokasi::create([
            'nama'=> 'KETENGAH JAYA'
        ]);
        Lokasi::create([
            'nama'=> 'CENEH BAHARU'
        ]);
        Lokasi::create([
            'nama'=> 'SERI BANDI'
        ]);
    }
}
