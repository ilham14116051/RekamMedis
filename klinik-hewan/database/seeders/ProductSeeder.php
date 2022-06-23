<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
            // JASA
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '2',
                'kd_product'             => 'JD-RENDAH',
                'nm_product'             => 'Jasa Dokter - Rendah',
                'purchase_price'         => '40000',
                'sale_price'             => '50000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '3',
                'kd_product'             => 'JD-SEDANG',
                'nm_product'             => 'Jasa Dokter - Sedang',
                'purchase_price'         => '90000',
                'sale_price'             => '100000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '4',
                'kd_product'             => 'JD-TINGGI',
                'nm_product'             => 'Jasa Dokter - Tinggi',
                'purchase_price'         => '140000',
                'sale_price'             => '150000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '2',
                'kd_product'             => 'PI-RENDAH',
                'nm_product'             => 'Pasang Infus - Rendah',
                'purchase_price'         => '90000',
                'sale_price'             => '100000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '3',
                'kd_product'             => 'PI-SEDANG',
                'nm_product'             => 'Pasang Infus - Sedang',
                'purchase_price'         => '90000',
                'sale_price'             => '100000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '1',
                'kelas_product_id'       => '4',
                'kd_product'             => 'PI-TINGGI',
                'nm_product'             => 'Pasang Infus - Tinggi',
                'purchase_price'         => '90000',
                'sale_price'             => '100000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],

            // PET HOTEL SERVICE
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '5',
                'kd_product'             => 'NM-SUITE',
                'nm_product'             => 'No Meal - Suite',
                'purchase_price'         => '30000',
                'sale_price'             => '35000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '6',
                'kd_product'             => 'NM-STANDARD',
                'nm_product'             => 'No Meal - Standard',
                'purchase_price'         => '40000',
                'sale_price'             => '50000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '7',
                'kd_product'             => 'NM-DELUXE',
                'nm_product'             => 'No Meal - Deluxe',
                'purchase_price'         => '50000',
                'sale_price'             => '55000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '5',
                'kd_product'             => 'IM-SUITE',
                'nm_product'             => 'Include Meal - Suite',
                'purchase_price'         => '40000',
                'sale_price'             => '50000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '6',
                'kd_product'             => 'IM-STANDARD',
                'nm_product'             => 'Include Meal - Standard',
                'purchase_price'         => '50000',
                'sale_price'             => '60000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
            [
                'kategori_product_id'    => '2',
                'kelas_product_id'       => '7',
                'kd_product'             => 'IM-DELUXE',
                'nm_product'             => 'Include Meal - Deluxe',
                'purchase_price'         => '60000',
                'sale_price'             => '70000',
                'stock'                  => '100',
                'remarks'                => '-'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
