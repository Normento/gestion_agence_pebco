<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>P.E.B.Co BETHESDA</title>
</head>

<body>
    <section class="headPage">
        <div class="leftPage">
            <img src="" alt="">
            <div class="lefText">
                @foreach ($agences as $agenx)
                @if ($agenx->code_agence == $agence)
                <p>PEBCO: {{$agenx->nom_agence}} ok</p>
                @endif
                @endforeach

                <p>Tel: </p>
                <p> BP: 1930 COTONOU</p>
            </div>
        </div>
        <div class="rightPage">
            <p>Imprimé le : {{date('d/m/Y')}}</p>
            <p>Imprimé par : {{Auth::user()->nom}} {{Auth::user()->prenom}}</p>
            <p>Journé :{{date('d/m/Y')}}</p>
        </div>
    </section>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Libelé</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            @if ($interets->count() > 0 || $frais_clients->count() > 0 || $depenses->count() > 0)


            <tr>
                @foreach ($interets as $interet)
            <tr>
                <td>Intérêts reçus sur opérations avec la clientèle</td>
                <td>{{$interet->interet_recu_operation_client}}</td>
            </tr>
            <tr>
                <td>Intérêts reçus sur opérations avec les tiers</td>
                <td>{{$interet->interet_recus_operation_tiers}}</td>
            </tr>
            <tr>
                <td>Interêts versés sur opérations avec la clientèle</td>
                <td>{{$interet->interet_verse_operation_client}}</td>
            </tr>
            <tr>
                <td>Intérêts versés sur opérations avec les tiers </td>
                <td>{{$interet->interet_verse_operation_tiers}}</td>
            </tr>
            <tr>
                <td>Coût du risque net</td>
                <td>{{$interet->cout_risque_net}}</td>
            </tr>
            <tr>
                <td>Mage d'interêts après coût du risque</td>
                <td>{{$interet->marge_interet_cout_risque}}</td>
            </tr>
            @endforeach
            </tr>
            <tr>
                @foreach ($frais_clients as $frais)
            <tr>
                <td>Frais de dossier de crédits</td>
                <td>{{$frais->frais_dossier_credits}}</td>
            </tr>
            <tr>
                <td>Commissions sur tontine</td>
                <td>{{$frais->commissions_tontine}}</td>
            </tr>
            <tr>
                <td>Frais de tenue de comptes </td>
                <td>{{$frais->frais_tenu_compte}}</td>
            </tr>
            <tr>
                <td>Pénalités sur prêts</td>
                <td>{{$frais->penalite_pret}}</td>
            </tr>
            <tr>
                <td>Autres commissions reçues</td>
                <td>{{$frais->autres_commission_recu}}</td>
            </tr>
            <tr>
                <td>Autres produits d'exploitation</td>
                <td>{{$frais->autre_produits_exploitation}}</td>
            </tr>
            <tr>
                @foreach ($interets as $interet)
                <td>Marge brute après coût du risque</td>
                <td>{{$frais->marge_brute_cout_risque + $interet->marge_interet_cout_risque}}</td>
                @endforeach
            </tr>
            @endforeach
            </tr>
            <tr>
                @foreach ($depenses as $depense)
            <tr>
                <td>Carburant</td>
                <td>{{$depense->carburants}}</td>
            </tr>
            <tr>
                <td>Eau et Electricité</td>
                <td>{{$depense->eau_electricite}}</td>
            </tr>
            <tr>
                <td>Dépenses informatiques</td>
                <td>{{$depense->depenses_informatiques}}</td>
            </tr>
            <tr>
                <td>Imprimés, fournitures de bureau et produits d'entretien</td>
                <td>{{$depense->imprime_fourniture_prod_entretient}}</td>
            </tr>
            <tr>
                <td>Compte61</td>
                <td>{{$depense->compte61}}</td>
            </tr>
            <tr>
                <td>Frais de personnel (autres contrats ou interim)</td>
                <td>{{$depense->frais_personnel}}</td>
            </tr>
            <tr>
                <td>Frais de formation</td>
                <td>{{$depense->frais_formation}}</td>
            </tr>
            <tr>
                <td>Prestataire de service exploitation commerciale</td>
                <td>{{$depense->prestation_service_exploitation_commerciale}}</td>
            </tr>
            <tr>
                <td>Assurances du personnel</td>
                <td>{{$depense->assurances_personnel}}</td>
            </tr>
            <tr>
                <td>Locations d'immeubles</td>
                <td>{{$depense->locations_immeubles}}</td>
            </tr>
            <tr>
                <td>Assurances des biens</td>
                <td>{{$depense->assurances_biens}}</td>
            </tr>
            <tr>
                <td>Frais de maintenance des matériels et immeubles</td>
                <td>{{$depense->frais_maintenance_materiels_immeubles}}</td>
            </tr>
            <tr>
                <td>Missions et reception</td>
                <td>{{$depense->missions_reception}}</td>
            </tr>
            <tr>
                <td>Téléphone et télecommunications</td>
                <td>{{$depense->telecom}}</td>
            </tr>
            <tr>
                <td>Publicité et promotions</td>
                <td>{{$depense->publicite_promotions}}</td>
            </tr>
            <tr>
                <td>Charges pour réunions statutaires</td>
                <td>{{$depense->charges_reunions}}</td>
            </tr>
            <tr>
                <td>Prestataires extérieurs hors exploitation commerciale</td>
                <td>{{$depense->prestataires_exterieurs}}</td>
            </tr>
            <tr>
                <td>Autres charges externes</td>
                <td>{{$depense->autres_charges_externes}}</td>
            </tr>
            <tr>
                <td>Fonds de garantie UMOA</td>
                <td>{{$depense->fond_garantie_uemoa}}</td>
            </tr>
            <tr>
                <td>Taxes et Impôts (hors Impôts sur les bénéfices)</td>
                <td>{{$depense->taxes_impot}}</td>
            </tr>
            <tr>
                <td>Frais de personnel en CDI</td>
                <td>{{$depense->frais_personnel_cdi}}</td>
            </tr>
            <tr>
                @foreach ($frais_clients as $frais)
                @foreach ($interets as $interet)
                <td>Excédent brut avant amortissements</td>
                <td>{{$depense->excedent_brute_avant_amortissement + $frais->marge_brute_cout_risque + $interet->marge_interet_cout_risque}}</td>
                @endforeach
                @endforeach
            </tr>
            <tr>
                <td>Dotation aux amortissements</td>
                <td>{{$depense->dotation_amortissements}}</td>
            </tr>
            <tr>
                <td>Résultat courant après autres impôts et taxes</td>
                @foreach ($frais_clients as $frais)
                @foreach ($interets as $interet)
                <td>{{$depense->resultat_courant_avant_impot_taxe + $depense->excedent_brute_avant_amortissement + $frais->marge_brute_cout_risque + $interet->marge_interet_cout_risque}}</td>
                @endforeach
                @endforeach
            </tr>
            <tr>
                <td>Autres charges exceptionnelles</td>
                <td>{{$depense->autre_charge_excep}}</td>
            </tr>
            <tr>
                <td>Autres produits exceptionnels</td>
                <td>{{$depense->autre_produits_excep}}</td>
            </tr>
            <tr>
                <td>Impôts sur les bénéfices</td>
                <td>{{$depense->impot_sur_benefice}}</td>
            </tr>
            <tr>
                <td>Résultat net</td>
                @foreach ($frais_clients as $frais)
                @foreach ($interets as $interet)
                <td>{{$depense->resultat_net + $depense->resultat_courant_avant_impot_taxe + $depense->excedent_brute_avant_amortissement + $frais->marge_brute_cout_risque + $interet->marge_interet_cout_risque}}</td>
                @endforeach
                @endforeach
            </tr>
            @endforeach
            </tr>
            @else
            <tr>
                <td colspan="2">Aucune donnée disponible pour {{$annee}}</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
<style>
    .headPage {
        display: flex;
        justify-content: space-between;
    }

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
