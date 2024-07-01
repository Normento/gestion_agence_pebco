<?php

namespace Database\Seeders;

use App\Models\Poste;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poste::create([
            'user_id' => 1,
            'code' => 'IF',
            'nom' => 'informatique',
        ]);
    }
}
