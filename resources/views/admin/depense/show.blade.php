@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Intérêt | <span>{{$depense->depense->nom_agence}}</span> | <span>{{$depense->annee}}</span></h4>
                <hr>
                <tbody>
                    <tr>
                        <th class=""><i class=""></i> Prévision des Carburants</th>
                        <td class="">{{$depense->carburants}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Eau et Électricité</th>
                        <td class="">{{$depense->eau_electricite}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dépenses informatiques </th>
                        <td class="">{{$depense->depenses_informatiques}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Imprimés, fournitures de bureau et produits d'entretien</th>
                        <td class="">{{$depense->imprime_fourniture_prod_entretient}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Compte 61</th>
                        <td class="">{{$depense->compte61}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de personnel (autres contrats ou intérim)</th>
                        <td class="">{{$depense->frais_personnel}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de formation</th>
                        <td class="">{{$depense->frais_formation}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataire de service exploitation commerciale</th>
                        <td class="">{{$depense->prestation_service_exploitation_commerciale}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances du personnel</th>
                        <td class="">{{$depense->assurances_personnel}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Locations d'immeubles</th>
                        <td class="">{{$depense->locations_immeubles}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances des biens</th>
                        <td class="">{{$depense->assurances_biens}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de maintenance des matériels et immeubles</th>
                        <td class="">{{$depense->frais_maintenance_materiels_immeubles}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Missions et réception</th>
                        <td class="">{{$depense->missions_reception}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Téléphone et télécommunications</th>
                        <td class="">{{$depense->telecom}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Publicité et promotions</th>
                        <td class="">{{$depense->publicite_promotions}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Charges pour réunions statutaires</th>
                        <td class="">{{$depense->charges_reunions}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataires extérieurs hors exploitation commerciale</th>
                        <td class="">{{$depense->prestataires_exterieurs}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres charges externes</th>
                        <td class="">{{$depense->autres_charges_externes}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Fond de garantie UEMOA</th>
                        <td class="">{{$depense->fond_garantie_uemoa}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Impôts et taxes</th>
                        <td class="">{{$depense->taxes_impot}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Excédent brut avant amortissements</th>
                        <td class="">{{$depense->excedent_brute_avant_amortissement}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Frais personnel CDI</th>
                        <td class="">{{$depense->frais_personnel_cdi}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dotation aux amortissements</th>
                        <td class="">{{$depense->dotation_amortissements}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Résultat courant après autres impôts et taxes</th>
                        <td class="">{{$depense->resultat_courant_avant_impot_taxe}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres charges exceptionnelles</th>
                        <td class="">{{$depense->autre_charge_excep}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits exceptionnels</th>
                        <td class="">{{$depense->autre_produits_excep}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Impôt sur bénéfice</th>
                        <td class="">{{$depense->impot_sur_benefice}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Resultat net</th>
                        <td class="">{{$depense->resultat_net}}</td>
                    </tr>

                    <tr >
                        <th class="bg-success bg-gradient"><i class=""></i>Total</th>
                        <td class="bg-success bg-gradient">{{$depense->carburants + $depense->eau_electricite + $depense->depenses_informatiques+
                            + $depense->imprime_fourniture_prod_entretient + $depense->frais_personnel + $depense->frais_formation +
                            $depense->prestation_service_exploitation_commerciale + $depense->assurances_personnel +
                            $depense->locations_immeubles + $depense->assurances_biens + $depense->frais_maintenance_materiels_immeubles +
                            $depense->telecom + $depense->publicite_promotions + $depense->missions_reception + $depense->charges_reunions +
                            $depense->prestataires_exterieurs + $depense->autres_charges_externes +
                            $depense->dotation_amortissements +$depense->fond_garantie_uemoa  + $depense->compte61 +
                            $depense->autre_charge_excep + $depense->autre_produits_excep + $depense->resultat_net + $depense->frais_personnel_cdi +
                            $depense->taxes_impot+  $depense->frais_personnel_cdi +$depense->impot_sur_benefice + $depense->resultat_net}}</td>
                    </tr>

                </tbody>

            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@endsection
