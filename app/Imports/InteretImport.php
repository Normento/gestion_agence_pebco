<?php

namespace App\Imports;

use App\Models\Interet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

//use Maatwebsite\Excel\Concerns\WithMappedCells;


class InteretImport implements  ToModel,WithHeadingRow
{


   /*  public function mapping(): array
    {
        return [
            'code_agence'  => 'B1',
            'interet_recu_operation_client' => 'B2',
            'interet_recus_operation_tiers' => 'B3',
            'interet_verse_operation_client' => 'B4',
            'interet_verse_operation_tiers' => 'B5',
            'cout_risque_net' => 'B6',
            'marge_interet_cout_risque' => 'B7',
            'annee' => 'B8',
        ];
    } */

    public function model(array $row)
    {
        $row['user_id'] = Auth::user()->id;
        return new Interet([
            'user_id' => $row['user_id'],
            'code_agence' => $row['code_agence'],
            'interet_recu_operation_client' => $row['interet_recu_operation_client'],
            'interet_recus_operation_tiers' => $row['interet_recus_operation_tiers'],
            'interet_verse_operation_client' => $row['interet_verse_operation_client'],
            'interet_verse_operation_tiers' => $row['interet_verse_operation_tiers'],
            'cout_risque_net' => $row['cout_risque_net'],
            'marge_interet_cout_risque' => $row['marge_interet_cout_risque'],
            'annee' => $row['annee'],
        ]);
    }
}
