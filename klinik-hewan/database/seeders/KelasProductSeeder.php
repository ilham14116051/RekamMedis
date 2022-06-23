<?php

namespace Database\Seeders;

use App\Models\KelasProduct;
use Illuminate\Database\Seeder;

class KelasProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kelas_products = [
            [
                'kd_kelas_product'    => 'general',
                'nm_kelas_product'    => 'GENERAL',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'rendah',
                'nm_kelas_product'    => 'RENDAH',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'sedang',
                'nm_kelas_product'    => 'SEDANG',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'tinggi',
                'nm_kelas_product'    => 'TINGGI',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'suite',
                'nm_kelas_product'    => 'Suite',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'standard',
                'nm_kelas_product'    => 'STANDARD',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => 'deluxe',
                'nm_kelas_product'    => 'DELUXE',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => '<5kg',
                'nm_kelas_product'    => '<5kg',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => '>5kg',
                'nm_kelas_product'    => '>5kg',
                'remarks'             => '-'
            ],
            [
                'kd_kelas_product'    => '>10kg',
                'nm_kelas_product'    => '>10kg',
                'remarks'             => '-'
            ],

        ];

        foreach ($kelas_products as $kelas_product) {
            KelasProduct::create($kelas_product);
        }
    }
}
