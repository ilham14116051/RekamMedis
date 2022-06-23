<?php

namespace Database\Seeders;

use App\Models\KelasProduct;
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
        $this->call([
            PasienSeeder::class,
            DokterSeeder::class,
            KategoriProductSeeder::class,
            KelasProductSeeder::class,
            ProductSeeder::class,
            EventSeeder::class,
        ]);
    }
}
