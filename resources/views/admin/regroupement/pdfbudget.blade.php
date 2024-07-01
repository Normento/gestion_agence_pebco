<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.E.B.Co BETHESDA</title>
</head>

<body>

    <section class="headPage">
        <div class="leftPage">
            <img src="{{ public_path('img/pebco.png')}}" alt="">
            <div class="lefText">
                @foreach ($regions as $regio)
                @if ($regio->id == $region)
                <p>REGION: {{$regio->nom_region}}</p>
                @endif
                @endforeach

                <p>Tel: </p>
                <p> BP: 1930 COTONOU</p>
            </div>
        </div>
        <div class="rightPage">
            <p>Imprimé le : {{date('d/m/Y')}}</p>
            <p>Imprimé par : {{Auth::user()->nom}} {{Auth::user()->prenom}}</p>
            <p>Journé : {{date('d/m/Y')}}</p>
        </div>
    </section>

    <table>
        <thead>
            <tr>
                <th>Libelé</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <!-- interet -->
            <tr>
                <th class=""><i class=""></i> Intérêts reçus sur opérations avec la clientèle</th>
                <td class="">{{$previsionInterets->sum('interet_recu_operation_client')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> intérêts reçus sur opérations avec les tiers</th>
                <td class="">{{$previsionInterets->sum('interet_recus_operation_tiers')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Intérêts versés sur opérations avec la clientèle</th>
                <td class="">{{$previsionInterets->sum('interet_verse_operation_client')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> intérêts versés sur opérations avec les tiers</th>
                <td class="">{{$previsionInterets->sum('interet_verse_operation_tiers')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Coût du risque net</th>
                <td class="">{{$previsionInterets->sum('cout_risque_net')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Mage d'interêts après coût du risque</th>
                <td class="">{{$previsionInterets->sum('marge_interet_cout_risque')}}</td>
            </tr>
            <!-- frais client -->
            <tr>
                <th class=""><i class=""></i> Frais de dossier de crédits</th>
                <td class="">{{$previsionFraitClients->sum('frais_dossier_credits')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Commissions sur tontine</th>
                <td class="">{{$previsionFraitClients->sum('commissions_tontine')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Frais de tenue de comptes </th>
                <td class="">{{$previsionFraitClients->sum('frais_tenu_compte')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Pénalités sur prêts</th>
                <td class="">{{$previsionFraitClients->sum('penalite_pret')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Autres commissions reçues</th>
                <td class="">{{$previsionFraitClients->sum('autres_commission_recu')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Autres produits d'exploitation</th>
                <td class="">{{$previsionFraitClients->sum('autre_produits_exploitation')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Marge brute après coût du risque</th>
                <td class="">{{$previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')}}</td>
            </tr>

            <!--  depense -->
            <tr>
                <th class=""><i class=""></i> Carburants</th>
                <td class="">{{$previsionDepenses->sum('carburants')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Eau et Électricité</th>
                <td class="">{{$previsionDepenses->sum('eau_electricite')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Dépenses informatiques </th>
                <td class="">{{$previsionDepenses->sum('depenses_informatiques')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Imprimés, fournitures de bureau et produits d'entretien</th>
                <td class="">{{$previsionDepenses->sum('imprime_fourniture_prod_entretient')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i>Compte 61</th>
                <td class="">{{$previsionDepenses->sum('compte61')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Frais de personnel (autres contrats ou intérim)</th>
                <td class="">{{$previsionDepenses->sum('frais_personnel')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Frais de formation</th>
                <td class="">{{$previsionDepenses->sum('frais_formation')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Prestataire de service exploitation commerciale</th>
                <td class="">{{$previsionDepenses->sum('prestation_service_exploitation_commerciale')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Assurances du personnel</th>
                <td class="">{{$previsionDepenses->sum('assurances_personnel')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Locations d'immeubles</th>
                <td class="">{{$previsionDepenses->sum('locations_immeubles')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Assurances des biens</th>
                <td class="">{{$previsionDepenses->sum('assurances_biens')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Frais de maintenance des matériels et immeubles</th>
                <td class="">{{$previsionDepenses->sum('frais_maintenance_materiels_immeubles')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Missions et réception</th>
                <td class="">{{$previsionDepenses->sum('missions_reception')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Téléphone et télécommunications</th>
                <td class="">{{$previsionDepenses->sum('telecom')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Publicité et promotions</th>
                <td class="">{{$previsionDepenses->sum('publicite_promotions')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Charges pour réunions statutaires</th>
                <td class="">{{$previsionDepenses->sum('charges_reunions')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Prestataires extérieurs hors exploitation commerciale</th>
                <td class="">{{$previsionDepenses->sum('prestataires_exterieurs')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Autres charges externes</th>
                <td class="">{{$previsionDepenses->sum('autres_charges_externes')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Fond de garantie UEMOA</th>
                <td class="">{{$previsionDepenses->sum('fond_garantie_uemoa')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Impôts et taxes</th>
                <td class="">{{$previsionDepenses->sum('taxes_impot')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i>Frais personnel CDI</th>
                <td class="">{{$previsionDepenses->sum('frais_personnel_cdi')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Excédent brut avant amortissements</th>
                <td class="">{{$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Dotation aux amortissements</th>
                <td class="">{{$previsionDepenses->sum('dotation_amortissements')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Résultat courant après autres impôts et taxes</th>
                <td class="">{{$previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Autres charges exceptionnelles</th>
                <td class="">{{$previsionDepenses->sum('autre_charge_excep')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Autres produits exceptionnels</th>
                <td class="">{{$previsionDepenses->sum('autre_produits_excep')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Impôt sur bénéfice</th>
                <td class="">{{$previsionDepenses->sum('impot_sur_benefice')}}</td>
            </tr>
            <tr>
                <th class=""><i class=""></i> Resultat net</th>
                <td class="">{{$previsionDepenses->sum('resultat_net') + $previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')}}</td>
            </tr>

            <tr>
                <th class="bg-success bg-gradient"><i class=""></i>Total</th>
                <td class="bg-success bg-gradient">{{$previsionInterets->sum('interet_recu_operation_client') +
                            $previsionInterets->sum('interet_recus_operation_tiers') + $previsionInterets->sum('interet_verse_operation_client') + $previsionInterets->sum('interet_verse_operation_tiers') +
                            $previsionInterets->sum('cout_risque_net') + $previsionInterets->sum('marge_interet_cout_risque') + $previsionFraitClients->sum('frais_dossier_credits') +
                            $previsionFraitClients->sum('commissions_tontine') + $previsionFraitClients->sum('frais_tenu_compte') + $previsionFraitClients->sum('penalite_pret') +
                            $previsionFraitClients->sum('autres_commission_recu') + $previsionFraitClients->sum('autre_produits_exploitation') + ($previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')) +
                            $previsionDepenses->sum('carburants') + $previsionDepenses->sum('eau_electricite') + $previsionDepenses->sum('depenses_informatiques') + $previsionDepenses->sum('imprime_fourniture_prod_entretient') +
                            $previsionDepenses->sum('compte61') + $previsionDepenses->sum('frais_personnel') + $previsionDepenses->sum('frais_formation') + $previsionDepenses->sum('prestation_service_exploitation_commerciale') +
                            $previsionDepenses->sum('assurances_personnel') + $previsionDepenses->sum('locations_immeubles') + $previsionDepenses->sum('assurances_biens') + $previsionDepenses->sum('frais_maintenance_materiels_immeubles') +
                            $previsionDepenses->sum('missions_reception') + $previsionDepenses->sum('telecom') + $previsionDepenses->sum('publicite_promotions') + $previsionDepenses->sum('charges_reunions') + $previsionDepenses->sum('prestataires_exterieurs') +
                            $previsionDepenses->sum('autres_charges_externes') + $previsionDepenses->sum('fond_garantie_uemoa') + $previsionDepenses->sum('taxes_impot') + $previsionDepenses->sum('frais_personnel_cdi') +
                            $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque') +  $previsionDepenses->sum('dotation_amortissements') +
                            ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque')) +
                            $previsionDepenses->sum('autre_charge_excep') + $previsionDepenses->sum('autre_produits_excep') + $previsionDepenses->sum('impot_sur_benefice') + ($previsionDepenses->sum('resultat_net') + $previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionFraitClients->sum('marge_brute_cout_risque') + $previsionInterets->sum('marge_interet_cout_risque'))}}</td>
            </tr>

        </tbody>
    </table>

</body>

</html>

<style>
    th,
    td,
    tr,
    table {
        border: 2px solid;
        border-collapse: collapse;
        padding: 20px;
    }

    .table {
        margin-left: 100px;
    }
</style>
