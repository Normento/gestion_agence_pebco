<?php

namespace App\Imports;

use App\Models\Depense;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class DepenseImport implements  ToModel,WithHeadingRow
{/*
    public function mapping(): array
    {
        return [
            'code_agence'  => 'B1',
            'carburants' => 'B2',
            'eau_electricite' => 'B3',
            'depenses_informatiques' => 'B4',
            'imprime_fourniture_prod_entretient' => 'B5',
            'compte61' => 'B6',
            'frais_personnel' => 'B7',
            'frais_formation' => 'B8',
            'prestation_service_exploitation_commerciale' => 'B9',
            'assurances_personnel' => 'B10',
            'locations_immeubles' => 'B11',
            'assurances_biens' => 'B12',
            'frais_maintenance_materiels_immeubles' => 'B13',
            'missions_reception' => 'B14',
            'telecom' => 'B15',
            'publicite_promotions' => 'B16',
            'charges_reunions' => 'B17',
            'prestataires_exterieurs' => 'B18',
            'autres_charges_externes' => 'B19',
            'fond_garantie_uemoa' => 'B20',
            'taxes_impot' => 'B21',
            'frais_personnel_cdi' => 'B22',
            'excedent_brute_avant_amortissement' => 'B23',
            'dotation_amortissements' => 'B24',
            'resultat_courant_avant_impot_taxe' => 'B25',
            'autre_charge_excep' => 'B26',
            'autre_produits_excep' => 'B27',
            'impot_sur_benefice' => 'B28',
            'resultat_net' => 'B29',
            'annee' => 'B30',
        ];
    } */
 /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row['user_id'] = Auth::user()->id;
        return new Depense([
            'user_id' => $row['user_id'],
            'code_agence'  => $row['code_agence'],
            'carburants' => $row['carburants'],
            'eau_electricite' => $row['eau_electricite'],
            'depenses_informatiques' => $row['depenses_informatiques'],
            'imprime_fourniture_prod_entretient' => $row['imprime_fourniture_prod_entretient'],
            'compte61' => $row['compte61'],
            'frais_personnel' => $row['frais_personnel'],
            'frais_formation' => $row['frais_formation'],
            'prestation_service_exploitation_commerciale' => $row['prestation_service_exploitation_commerciale'],
            'assurances_personnel' => $row['assurances_personnel'],
            'locations_immeubles' => $row['locations_immeubles'],
            'assurances_biens' => $row['assurances_biens'],
            'frais_maintenance_materiels_immeubles' => $row['frais_maintenance_materiels_immeubles'],
            'missions_reception' => $row['missions_reception'],
            'telecom' => $row['telecom'],
            'publicite_promotions' => $row['publicite_promotions'],
            'charges_reunions' => $row['charges_reunions'],
            'prestataires_exterieurs' => $row['prestataires_exterieurs'],
            'autres_charges_externes' => $row['autres_charges_externes'],
            'fond_garantie_uemoa' => $row['fond_garantie_uemoa'],
            'taxes_impot' => $row['taxes_impot'],
            'frais_personnel_cdi' => $row['frais_personnel_cdi'],
            'excedent_brute_avant_amortissement' => $row['excedent_brute_avant_amortissement'],
            'dotation_amortissements' => $row['dotation_amortissements'],
            'resultat_courant_avant_impot_taxe' => $row['resultat_courant_avant_impot_taxe'],
            'autre_charge_excep' => $row['autre_charge_excep'],
            'autre_produits_excep' => $row['autre_produits_excep'],
            'impot_sur_benefice' => $row['impot_sur_benefice'],
            'resultat_net' => $row['resultat_net'],
            'annee' => $row['annee'],
        ]);
    }
}
