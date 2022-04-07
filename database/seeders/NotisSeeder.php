<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Notis;

class NotisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notis::truncate();
        Notis::create([
            'admin_id'=> '1',
            'tajuk'=> 'Selamat Datang',
            'keterangan'=>'Selamat Datang ke Applikasi Ketengah E-Sisper',
            'created_at'=>'2030-03-21 07:17:31'
        ]);
    }
}
