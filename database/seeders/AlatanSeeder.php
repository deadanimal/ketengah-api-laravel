<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alatan;

class AlatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alatan::truncate();
        Alatan::create([
            'nama_alatan'=> 'Kanopi 20x20',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'250',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Kanopi 10x20',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'120',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Meja Bulat',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'15',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Meja Panjang 3x6',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'10',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Kerusi Banquet (A)',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'2',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Kerusi Plastik',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'0.5',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Sofa / Sette',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'10',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Rostrum',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'5',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Armchair Kayu',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'50',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Platform beserta Carpet',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'3',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Panel Backdrop (M2)',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'3',
            'bilangan'=>'1',
        ]);
        Alatan::create([
            'nama_alatan'=> 'Sinki dan Kelengkapan',
            'kod_urusan'=> '0',
            'kod_sub_urusan'=> '0',
            'harga'=>'5',
            'bilangan'=>'1',
        ]);
    }
}
