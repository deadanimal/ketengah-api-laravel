<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Admin::create([
            'password'=> 'pass',
            'no_telefon'=> '011',
            'email'=> 'email',
            'nama'=>'nama admin'
        ]);
    }
}
