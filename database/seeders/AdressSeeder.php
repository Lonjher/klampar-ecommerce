<?php

namespace Database\Seeders;

use App\Models\Adress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
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
            [
                'user_id' => 2,
                'dusun' => 'Berek Songai',
                'desa' => 'Klampar',
                'kecamatan' => 'Proppo',
                'kabupaten' => 'Pamekasan'
            ],
            [
                'user_id' => 3,
                'dusun' => 'Temor Songai',
                'desa' => 'Klampar',
                'kecamatan' => 'Proppo',
                'kabupaten' => 'Pamekasan'
            ],
            [
                'user_id' => 4,
                'dusun' => '-',
                'desa' => 'Prenduan',
                'kecamatan' => 'Prenduan',
                'kabupaten' => 'Sumenep'
            ]
        ];

        foreach($adresses as $adress){
            Adress::create($adress);
        };
    }
}
