<?php

namespace Database\Seeders;

use App\Models\Alamat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adresses = [
            [
                'user_id' => 1,
                'dusun' => 'Sumber Mas',
                'desa' => 'Klampar',
                'kecamatan' => 'Proppo',
                'kabupaten' => 'Pamekasan'
            ],
            // [
            //     'user_id' => 2,
            //     'dusun' => 'Berek Songai',
            //     'desa' => 'Klampar',
            //     'kecamatan' => 'Proppo',
            //     'kabupaten' => 'Pamekasan'
            // ],
            // [
            //     'user_id' => 3,
            //     'dusun' => 'Temor Songai',
            //     'desa' => 'Klampar',
            //     'kecamatan' => 'Proppo',
            //     'kabupaten' => 'Pamekasan'
            // ],
            // [
            //     'user_id' => 4,
            //     'dusun' => '-',
            //     'desa' => 'Prenduan',
            //     'kecamatan' => 'Prenduan',
            //     'kabupaten' => 'Sumenep'
            // ]
        ];

        foreach($adresses as $adress){
            Alamat::create($adress);
        };
    }
}
