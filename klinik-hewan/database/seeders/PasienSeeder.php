<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pasiens = [

            [
                'nm_hewan'      => 'MOLY 1',
                'jenis_hewan'   => 'KUCING',
                'spesies'       => 'Mongol',
                'sex'           => 'jantan',
                'nm_pemilik'    => 'SAYA',
                'phone'         => '00',
                'address'       => 'BEKASI',
                'remarks'       => '-',
            ],
            [
                'nm_hewan'      => 'MOLY 2',
                'jenis_hewan'   => 'ANJING',
                'spesies'       => 'Rusia',
                'sex'           => 'betina',
                'nm_pemilik'    => 'KAMU',
                'phone'         => '00',
                'address'       => 'JAKARTA',
                'remarks'       => '-',
            ],
            [
                'nm_hewan'      => 'MOLY 3',
                'jenis_hewan'   => 'IKAN',
                'spesies'       => 'Rusia',
                'sex'           => 'jantan',
                'nm_pemilik'    => 'DIA',
                'phone'         => '00',
                'address'       => 'KARAWANG',
                'remarks'       => '-',
            ],
        ];

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }
    }
}
