<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            AduanSeeder::class,
            KategoriAduanSeeder::class,
            NotisSeeder::class,
            AdminSeeder::class,
            DewanSeeder::class,
            LokasiSeeder::class,
            UrusanSeeder::class,
            AlatanSeeder::class,
            FutsalSeeder::class,
            BadmintonSeeder::class
        ]);
    }
}
