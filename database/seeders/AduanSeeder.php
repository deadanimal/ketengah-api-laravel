<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Aduan;

class AduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aduans')->truncate();
        Aduan::create([
            'user_id'=> '1',
            'kategori'=> '01',
            'jenis_rosak'=> '01',
            'catatan'=>'test catatan',
            'status'=>'0'
        ]);
        Aduan::create([
            'user_id'=> '1',
            'kategori'=> '01',
            'jenis_rosak'=> '01',
            'catatan'=>'test catatan',
            'status'=>'0'
        ]);
    }
}
