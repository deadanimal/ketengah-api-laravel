<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name'=> 'testnama',
            'no_ic'=> '660823115217',
            'no_telefon'=> '123',
            'alamat'=>'1',
            'poskod'=>'1',
            'bandar'=>'1',
            'negeri'=>'1',
            'email'=>'1',
            'password'=>'pass',
            'active'=>1
        ]);
    }
}