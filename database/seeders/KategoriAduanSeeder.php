<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\KategoriAduan;

class KategoriAduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriAduan::truncate();
        KategoriAduan::create([
            'kategori_id'=> '01',
            'kategori'=> 'Pintu',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Pintu Tandas'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '01',
            'kategori'=> 'Pintu',
            'kerosakan_id'=> '03',
            'kerosakan'=>'Pintu Dapur'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '01',
            'kategori'=> 'Pintu',
            'kerosakan_id'=> '04',
            'kerosakan'=>'Pintu Hadapan'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '01',
            'kategori'=> 'Pintu',
            'kerosakan_id'=> '05',
            'kerosakan'=>'Pintu Bilik Tidur'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '01',
            'kategori'=> 'Pintu',
            'kerosakan_id'=> '06',
            'kerosakan'=>'Pintu Tingkap'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '02',
            'kategori'=> 'Atap/Perabung',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Atap Asbestos'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '02',
            'kategori'=> 'Atap/Perabung',
            'kerosakan_id'=> '02',
            'kerosakan'=>'Atap Genting'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '02',
            'kategori'=> 'Atap/Perabung',
            'kerosakan_id'=> '03',
            'kerosakan'=>'Atap Perabung'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '03',
            'kategori'=> 'Tangga',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Tangga Depan'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '03',
            'kategori'=> 'Tangga',
            'kerosakan_id'=> '02',
            'kerosakan'=>'Tangga Belakang'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '04',
            'kategori'=> 'Bilik',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Bilik Utama'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '05',
            'kategori'=> 'Tandas',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Mangkuk Tandas'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '05',
            'kategori'=> 'Tandas',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Pump Tandas'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '06',
            'kategori'=> 'Tiang',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Tiang Rumah'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '07',
            'kategori'=> 'Rasuk',
            'kerosakan_id'=> '00',
            'kerosakan'=>'-'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '08',
            'kategori'=> 'Paip',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Paip Bocor'
        ]);
        KategoriAduan::create([
            'kategori_id'=> '09',
            'kategori'=> 'Suwa',
            'kerosakan_id'=> '01',
            'kerosakan'=>'Mainhole'
        ]);
        KategoriAduan::create([
                'kategori_id'=> '09',
                'kategori'=> 'Suwa',
                'kerosakan_id'=> '02',
                'kerosakan'=>'Suwa Line'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '10',
                'kategori'=> 'Frame',
                'kerosakan_id'=> '01',
                'kerosakan'=>'Frame Tingkap'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '10',
                'kategori'=> 'Frame',
                'kerosakan_id'=> '02',
                'kerosakan'=>'Frame Sliding Door'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '10',
                'kategori'=> 'Frame',
                'kerosakan_id'=> '03',
                'kerosakan'=>'Frame Naco'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '11',
                'kategori'=> 'Siling',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '12',
                'kategori'=> 'Facia',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '13',
                'kategori'=> 'Kabinet',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '14',
                'kategori'=> 'Kunci',
                'kerosakan_id'=> '01',
                'kerosakan'=>'Kunci Handle'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '14',
                'kategori'=> 'Kunci',
                'kerosakan_id'=> '02',
                'kerosakan'=>'Kunci Tombol'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '15',
                'kategori'=> 'Cermin Naco',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '16',
                'kategori'=> 'Cermin Tingkap',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '17',
                'kategori'=> 'Cermin Sliding Door',
                'kerosakan_id'=> '00',
                'kerosakan'=>'-'
            ]);
        KategoriAduan::create([
                'kategori_id'=> '18',
                'kategori'=> 'Lantai',
                'kerosakan_id'=> '01',
                'kerosakan'=>'Ruang Tamu'
            ]);
    }
}
