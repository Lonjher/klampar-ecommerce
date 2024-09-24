<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'avatar' => 'avatars/1oQTUkIwVLhuTvuMDCeINsnTGdspfJenD1gYleme.jpg',
                'wa_number' => '085156752475',
                'role_id'=> 1,
                'password' => Hash::make('11111111')
            ],
            // [
            //     'name' => 'Lailur Rahman',
            //     'email' => 'ilur@ilur.com',
            //     'username' => 'ilur',
            //     'avatar' => 'avatars/drwjtFvel0OQwacCSFe9INj4kb5lP25MPLMuZ1sA.jpg',
            //     'wa_number' => '082228462025',
            //     'role_id'=> 2,
            //     'password' => Hash::make('22222222')
            // ],
            // [
            //     'name' => 'Filman Agil Sabata',
            //     'email' => 'agil@agil.com',
            //     'username' => 'agil',
            //     'avatar' => 'avatars/drwjtFvel0OQwacCSFe9INj4kb5lP25MPLMuZ1sA.jpg',
            //     'wa_number' => '087884734507',
            //     'role_id'=> 2,
            //     'password' => Hash::make('33333333')
            // ],
            // [
            //     'name' => 'User Biasa',
            //     'email' => 'user@user.com',
            //     'username' => 'user-biasa',
            //     'avatar' => 'avatars/drwjtFvel0OQwacCSFe9INj4kb5lP25MPLMuZ1sA.jpg',
            //     'wa_number' => '085604749536',
            //     'role_id'=> 3,
            //     'password' => Hash::make('44444444')
            // ]
        ];

        foreach($users as $user ){
            User::create($user);
        };
    }
}
