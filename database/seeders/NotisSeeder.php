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
            'tajuk'=> 'Pintu',
            'keterangan'=>'Pintu Tandas'
        ]);
    }
}
