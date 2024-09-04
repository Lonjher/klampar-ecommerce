<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Walid',
            'email' => 'walid@walid.com',
            'avatar' => 'assets/img/profil.jpg',
            'wa_number' => '085156752475',
            'isAdmin'=> 1,
            'password' => Hash::make('22222222')
        ]);
    }
}
