<?php

namespace App\Imports;

use App\Models\FraisClient;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

//use Maatwebsite\Excel\Concerns\WithMappedCells;

class FraisClientImport implements  ToModel,WithHeadingRow
{
/*
    public function mapping(): array
    {
        return [
            'code_agence'  => 'B1',
            'frais_dossier_credits' => 'B2',
            'commissions_tontine' => 'B3',
            'frais_tenu_compte' => 'B4',
            'penalite_pret' => 'B5',
            'autres_commission_recu' => 'B6',
            'autre_produits_exploitation' => 'B7',
            'marge_brute_cout_risque' => 'B8',
            'annee' => 'B9',
        ];
    } */

    public function model(array $row)
    {
        $row['user_id'] = Auth::user()->id;
        return new FraisClient([
            'user_id' => $row['user_id'],
            'code_agence' => $row['code_agence'],
            'frais_dossier_credits' => $row['frais_dossier_credits'],
            'commissions_tontine' => $row['commissions_tontine'],
            'frais_tenu_compte' => $row['frais_tenu_compte'],
            'penalite_pret' => $row['penalite_pret'],
            'autres_commission_recu' => $row['autres_commission_recu'],
            'autre_produits_exploitation' => $row['autre_produits_exploitation'],
            'marge_brute_cout_risque' => $row['marge_brute_cout_risque'],
            'annee' => $row['annee'],
        ]);
    }
}
