<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dokters = [
            [
                'nm_dokter'    => 'FIJAY',
                'spesialis'    => 'Dokter Umum',
                'phone'    => '0812918218',
                'address'    => 'Bekasi',
                'remarks'    => '-'
            ],
            [
                'nm_dokter'    => 'Pradana',
                'spesialis'    => 'Dokter Bedah',
                'phone'    => '0812918218',
                'address'    => 'Jakarta',
                'remarks'    => '-'
            ],
        ];

        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }
    }
}
