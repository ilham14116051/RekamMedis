<?php

namespace Database\Seeders;

use App\Models\KategoriProduct;
use Illuminate\Database\Seeder;

class KategoriProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategoriProducts = [
            [
                'kd_kategori_product'    => 'JASA',
                'nm_kategori_product'    => 'JASA',
                'remarks'                => '-'
            ],
            [
                'kd_kategori_product'    => 'PHS',
                'nm_kategori_product'    => 'PET HOTEL SERVICE',
                'remarks'                => '-'
            ],
            [
                'kd_kategori_product'    => 'OBAT',
                'nm_kategori_product'    => 'OBAT-OBATAN',
                'remarks'                => '-'
            ],
            [
                'kd_kategori_product'    => 'ALKES',
                'nm_kategori_product'    => 'ALAT KESEHATAN',
                'remarks'                => '-'
            ],
            [
                'kd_kategori_product'    => 'PAKES',
                'nm_kategori_product'    => 'PAKAN KESEHATAN',
                'remarks'                => '-'
            ],
        ];

        foreach ($kategoriProducts as $kategoriProduct) {
            KategoriProduct::create($kategoriProduct);
        }
    }
}
