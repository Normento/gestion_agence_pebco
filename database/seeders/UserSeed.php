<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom' => 'Alexandre',
            'prenom' => 'Alexandre',
            'email' => 'malomonalexandre@gmail.com',
            'code_agence'=>'Direction',
            'email_verified_at' => now(),
            'password' => bcrypt('1234567890'), // password
        ]);
    }
}
