<?php

namespace Database\Seeders;

use App\Models\Agence;
use Illuminate\Database\Seeder;

class AgenceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agence::create([
            'user_id' => 1,
            'code_agence' => 'Direction',
            'nom_agence' => 'Direction',
            'region_id' => 1
        ]);
    }
}
