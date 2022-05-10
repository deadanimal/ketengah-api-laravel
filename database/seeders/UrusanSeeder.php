<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Urusan;

class UrusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Urusan::truncate();
        Urusan::create([
            'urusan'=> 'Pembelian Barangan Terpakai'
        ]);
        Urusan::create([
            'urusan'=> 'Bayaran Balik Insurans'
        ]);
        Urusan::create([
            'urusan'=> 'Pembelian Lot Kosong'
        ]);
        Urusan::create([
            'urusan'=> 'Pembelian Plan'
        ]);
        Urusan::create([
            'urusan'=> 'Sewa Pasar'
        ]);
        Urusan::create([
            'urusan'=> 'Gerai Tasik Kenyir'
        ]);
        Urusan::create([
            'urusan'=> 'Pelbagai'
        ]);
    }
}
