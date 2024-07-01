@extends('partial.app')
@section('content')


<section class="wrapper site-min-height">

    <form class="form-group col-md-6 ml-3" action="{{ route('statistique')}}" method="post" id="search-form">
        @csrf
        <div class="search">
            @if (Auth::user()->role == 1 || Auth::user()->role == 0)
            <select name="region" id="" class="form-control">
                <option value="">veuillez choisir une region</option>
                @foreach ($regions as $region)

                <option value="{{ $region->id}}">{{$region->nom_region}}</option>


                @endforeach

            </select>
            @endif

            <select name="annee" height='50px' id="" class="form-control">
                <option value="">veuillez choisir une année</option>
                @for ($i = 2021; $i<= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                    @endfor
            </select>
            <button class="btn btn-info" type="submit">Recherche</button>
        </div>
    </form>


    <div class="row mt">
        <div class="col-lg">
            <div class="border-head">
                <h3><i class="fa fa-angle-right"></i> Interet par régions</h3>
            </div>
            <!-- CHART PANELS -->
            <div class="row">
                @foreach ($interets as $interet)
                @foreach ($interetRealisers as $interetRealiser)
                @if ($interetRealiser->nom_region == $interet->nom_region)

                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                            <h5>{{$interet->nom_region}}</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{($interet['interets']->sum('interet_recu_operation_client') + $interet['interets']->sum('interet_recus_operation_tiers') + $interet['interets']->sum('interet_verse_operation_client')+ $interet['interets']->sum('interet_verse_operation_tiers')+ $interet['interets']->sum('cout_risque_net')+ $interet['interets']->sum('marge_interet_cout_risque'))}}</h1>

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($interetRealiser['interetRealisers']->sum('interet_recu_operation_client_realiser') + $interetRealiser['interetRealisers']->sum('interet_recus_operation_tiers_realiser') + $interetRealiser['interetRealisers']->sum('interet_verse_operation_client_realiser') + $interetRealiser['interetRealisers']->sum('interet_verse_operation_tiers_realiser') + $interetRealiser['interetRealisers']->sum('cout_risque_net_realiser') + $interetRealiser['interetRealisers']->sum('marge_interet_cout_risque_realiser')) / 1000}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux:
                                @if ( $interetRealiser['interetRealisers']->sum('interet_recu_operation_client_realiser') + $interetRealiser['interetRealisers']->sum('interet_recus_operation_tiers_realiser') > 0)

                                {{((($interetRealiser['interetRealisers']->sum('interet_recu_operation_client_realiser') + $interetRealiser['interetRealisers']->sum('interet_recus_operation_tiers_realiser') + $interetRealiser['interetRealisers']->sum('interet_verse_operation_client_realiser') + $interetRealiser['interetRealisers']->sum('interet_verse_operation_tiers_realiser') + $interetRealiser['interetRealisers']->sum('cout_risque_net_realiser') + $interetRealiser['interetRealisers']->sum('marge_interet_cout_risque_realiser')) / 1000) / ($interet['interets']->sum('interet_recu_operation_client') + $interet['interets']->sum('interet_recus_operation_tiers') + $interet['interets']->sum('interet_verse_operation_client')+ $interet['interets']->sum('interet_verse_operation_tiers')+ $interet['interets']->sum('cout_risque_net')+ $interet['interets']->sum('marge_interet_cout_risque'))) * 100}}%
                            </h1>
                            @else
                            0%
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p></p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    <!-- /grey-panel -->
                </div>
                @endif
                @endforeach
                @endforeach
            </div>

            <!-- Frais Clients -->
            <div class="border-head">
                <h3><i class="fa fa-angle-right"></i> Fais Client par régions</h3>
            </div>
            <!-- CHART PANELS -->
            <div class="row">
                @foreach ($fraisClients as $fraisClient)
                @foreach ($fraisRealisers as $fraisRealiser)
                @if ($fraisRealiser->nom_region == $fraisClient->nom_region)

                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                            <h5>{{$fraisClient->nom_region}}</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{($fraisClient['frais']->sum('frais_dossier_credits') + $fraisClient['frais']->sum('commissions_tontine') + $fraisClient['frais']->sum('frais_tenu_compte')+ $fraisClient['frais']->sum('penalite_pret')+ $fraisClient['frais']->sum('autres_commission_recu')+ $fraisClient['frais']->sum('autre_produits_exploitation') + $fraisClient['frais']->sum('marge_brute_cout_risque'))}}</h1>

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($fraisRealiser['fraisRealisers']->sum('frais_dossier_credits') + $fraisRealiser['fraisRealisers']->sum('commissions_tontine') + $fraisRealiser['fraisRealisers']->sum('frais_tenu_compte')+ $fraisRealiser['fraisRealisers']->sum('penalite_pret')+ $fraisRealiser['fraisRealisers']->sum('autres_commission_recu')+ $fraisRealiser['fraisRealisers']->sum('autre_produits_exploitation') + $fraisRealiser['fraisRealisers']->sum('marge_brute_cout_risque')) / 1000}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux:
                                @if ($fraisRealiser['fraisRealisers']->sum('frais_dossier_credits') + $fraisRealiser['fraisRealisers']->sum('commissions_tontine') > 0)

                                {{((($fraisRealiser['fraisRealisers']->sum('frais_dossier_credits') + $fraisRealiser['fraisRealisers']->sum('commissions_tontine') + $fraisRealiser['fraisRealisers']->sum('frais_tenu_compte')+ $fraisRealiser['fraisRealisers']->sum('penalite_pret')+ $fraisRealiser['fraisRealisers']->sum('autres_commission_recu')+ $fraisRealiser['fraisRealisers']->sum('autre_produits_exploitation') + $fraisRealiser['fraisRealisers']->sum('marge_brute_cout_risque')) / 1000) / ($fraisClient['frais']->sum('frais_dossier_credits') + $fraisClient['frais']->sum('commissions_tontine') + $fraisClient['frais']->sum('frais_tenu_compte')+ $fraisClient['frais']->sum('penalite_pret')+ $fraisClient['frais']->sum('autres_commission_recu')+ $fraisClient['frais']->sum('autre_produits_exploitation') + $fraisClient['frais']->sum('marge_brute_cout_risque'))) * 100}}%
                                @else
                                0%

                                @endif
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p></p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    <!-- /grey-panel -->
                </div>
                @endif
                @endforeach
                @endforeach
            </div>


            <!--    dépense -->

            <div class="border-head">
                <h3><i class="fa fa-angle-right"></i> Dépense par régions</h3>
            </div>
            <!-- CHART PANELS -->
            <div class="row">
                @foreach ($depenses as $depense)
                @foreach ($depensesRealisers as $depensesRealiser)
                @if ($depensesRealiser->nom_region == $depense->nom_region)

                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                            <h5>{{$depense->nom_region}}</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{($depense['depenses']->sum('carburants') + $depense['depenses']->sum('eau_electricite') + $depense['depenses']->sum('depenses_informatiques')+ $depense['depenses']->sum('imprime_fourniture_prod_entretient')+ $depense['depenses']->sum('compte61')+ $depense['depenses']->sum('frais_personnel')
                                + $depense['depenses']->sum('frais_formation')+ $depense['depenses']->sum('locations_immeubles')+ $depense['depenses']->sum('missions_reception')+ $depense['depenses']->sum('publicite_promotions')+ $depense['depenses']->sum('prestataires_exterieurs')+ $depense['depenses']->sum('fond_garantie_uemoa')+ $depense['depenses']->sum('frais_personnel_cdi')+ $depense['depenses']->sum('dotation_amortissements')+ $depense['depenses']->sum('autre_charge_excep')
                                + $depense['depenses']->sum('prestation_service_exploitation_commerciale')+ $depense['depenses']->sum('assurances_biens')+ $depense['depenses']->sum('telecom')+ $depense['depenses']->sum('charges_reunions')+ $depense['depenses']->sum('autres_charges_externes')+ $depense['depenses']->sum('taxes_impot')+ $depense['depenses']->sum('excedent_brute_avant_amortissement')+ $depense['depenses']->sum('resultat_courant_avant_impot_taxe')+ $depense['depenses']->sum('autre_produits_excep')+ $depense['depenses']->sum('impot_sur_benefice')
                                + $depense['depenses']->sum('assurances_personnel')+ $depense['depenses']->sum('frais_maintenance_materiels_immeubles') + + $depense['depenses']->sum('resultat_net'))}}</h1>

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($depensesRealiser['depensesRealisers']->sum('carburants') + $depensesRealiser['depensesRealisers']->sum('eau_electricite') + $depensesRealiser['depensesRealisers']->sum('depenses_informatiques')+ $depensesRealiser['depensesRealisers']->sum('imprime_fourniture_prod_entretient')+ $depensesRealiser['depensesRealisers']->sum('compte61')+ $depensesRealiser['depensesRealisers']->sum('frais_personnel')
                                + $depensesRealiser['depensesRealisers']->sum('frais_formation')+ $depensesRealiser['depensesRealisers']->sum('locations_immeubles')+ $depensesRealiser['depensesRealisers']->sum('missions_reception')+ $depensesRealiser['depensesRealisers']->sum('publicite_promotions')+ $depensesRealiser['depensesRealisers']->sum('prestataires_exterieurs')+ $depensesRealiser['depensesRealisers']->sum('fond_garantie_uemoa')+ $depensesRealiser['depensesRealisers']->sum('frais_personnel_cdi')+ $depensesRealiser['depensesRealisers']->sum('dotation_amortissements')+ $depensesRealiser['depensesRealisers']->sum('autre_charge_excep')
                                + $depensesRealiser['depensesRealisers']->sum('prestation_service_exploitation_commerciale')+ $depensesRealiser['depensesRealisers']->sum('assurances_biens')+ $depensesRealiser['depensesRealisers']->sum('telecom')+ $depensesRealiser['depensesRealisers']->sum('charges_reunions')+ $depensesRealiser['depensesRealisers']->sum('autres_charges_externes')+ $depensesRealiser['depensesRealisers']->sum('taxes_impot')+ $depensesRealiser['depensesRealisers']->sum('excedent_brute_avant_amortissement')+ $depensesRealiser['depensesRealisers']->sum('resultat_courant_avant_impot_taxe')+ $depensesRealiser['depensesRealisers']->sum('autre_produits_excep')+ $depensesRealiser['depensesRealisers']->sum('impot_sur_benefice')
                                + $depensesRealiser['depensesRealisers']->sum('assurances_personnel')+ $depensesRealiser['depensesRealisers']->sum('frais_maintenance_materiels_immeubles') + $depensesRealiser['depensesRealisers']->sum('resultat_net')) / 1000}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux:
                                @if ( $depensesRealiser['depensesRealisers']->sum('autre_produits_excep') > 0)
                                {{((($depensesRealiser['depensesRealisers']->sum('carburants') + $depensesRealiser['depensesRealisers']->sum('eau_electricite') + $depensesRealiser['depensesRealisers']->sum('depenses_informatiques')+ $depensesRealiser['depensesRealisers']->sum('imprime_fourniture_prod_entretient')+ $depensesRealiser['depensesRealisers']->sum('compte61')+ $depensesRealiser['depensesRealisers']->sum('frais_personnel')
                                + $depensesRealiser['depensesRealisers']->sum('frais_formation')+ $depensesRealiser['depensesRealisers']->sum('locations_immeubles')+ $depensesRealiser['depensesRealisers']->sum('missions_reception')+ $depensesRealiser['depensesRealisers']->sum('publicite_promotions')+ $depensesRealiser['depensesRealisers']->sum('prestataires_exterieurs')+ $depensesRealiser['depensesRealisers']->sum('fond_garantie_uemoa')+ $depensesRealiser['depensesRealisers']->sum('frais_personnel_cdi')+ $depensesRealiser['depensesRealisers']->sum('dotation_amortissements')+ $depensesRealiser['depensesRealisers']->sum('autre_charge_excep')
                                + $depensesRealiser['depensesRealisers']->sum('prestation_service_exploitation_commerciale')+ $depensesRealiser['depensesRealisers']->sum('assurances_biens')+ $depensesRealiser['depensesRealisers']->sum('telecom')+ $depensesRealiser['depensesRealisers']->sum('charges_reunions')+ $depensesRealiser['depensesRealisers']->sum('autres_charges_externes')+ $depensesRealiser['depensesRealisers']->sum('taxes_impot')+ $depensesRealiser['depensesRealisers']->sum('excedent_brute_avant_amortissement')+ $depensesRealiser['depensesRealisers']->sum('resultat_courant_avant_impot_taxe')+ $depensesRealiser['depensesRealisers']->sum('autre_produits_excep')+ $depensesRealiser['depensesRealisers']->sum('impot_sur_benefice')
                                + $depensesRealiser['depensesRealisers']->sum('assurances_personnel')+ $depensesRealiser['depensesRealisers']->sum('frais_maintenance_materiels_immeubles') +  $depensesRealiser['depensesRealisers']->sum('resultat_net')) / 1000) /
($depense['depenses']->sum('carburants') + $depense['depenses']->sum('eau_electricite') + $depense['depenses']->sum('depenses_informatiques')+ $depense['depenses']->sum('imprime_fourniture_prod_entretient')+ $depense['depenses']->sum('compte61')+ $depense['depenses']->sum('frais_personnel')
                                + $depense['depenses']->sum('frais_formation')+ $depense['depenses']->sum('locations_immeubles')+ $depense['depenses']->sum('missions_reception')+ $depense['depenses']->sum('publicite_promotions')+ $depense['depenses']->sum('prestataires_exterieurs')+ $depense['depenses']->sum('fond_garantie_uemoa')+ $depense['depenses']->sum('frais_personnel_cdi')+ $depense['depenses']->sum('dotation_amortissements')+ $depense['depenses']->sum('autre_charge_excep')
                                + $depense['depenses']->sum('prestation_service_exploitation_commerciale')+ $depense['depenses']->sum('assurances_biens')+ $depense['depenses']->sum('telecom')+ $depense['depenses']->sum('charges_reunions')+ $depense['depenses']->sum('autres_charges_externes')+ $depense['depenses']->sum('taxes_impot')+ $depense['depenses']->sum('excedent_brute_avant_amortissement')+ $depense['depenses']->sum('resultat_courant_avant_impot_taxe')+ $depense['depenses']->sum('autre_produits_excep')+ $depense['depenses']->sum('impot_sur_benefice')
                                + $depense['depenses']->sum('assurances_personnel')+ $depense['depenses']->sum('frais_maintenance_materiels_immeubles') +  $depense['depenses']->sum('resultat_net'))) * 100
                            }}%
                                @else
                                0%
                                @endif
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p></p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    <!-- /grey-panel -->
                </div>
                @endif
                @endforeach
                @endforeach
            </div>





        </div>
        <!-- <div class="border-head">
            <h3><i class="fa fa-angle-right"></i> Statistique après collecte</h3>
        </div>

        <div class="col-md-4 col-sm-4 mb">
            <div class="grey-panel pn donut-chart">
                <div class="grey-header">
                    <h5>POIDS</h5>
                </div>
                <h1 id="serverstatus01" style="font-size: 100px;">98</h1>

                <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                        <p></p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <h2> </h2>
                    </div>
                </div>
            </div>
             /grey-panel
        </div> -->

    </div>
</section>


<style>
    .search {
        display: flex;
        margin-top: 20px;
        justify-content: start;

    }

    button {
        margin: 2px;
        margin-top: -1px;
    }

    input {
        margin: 4px;
    }

    select {
        margin: 5px;
        height: 500px;
    }
</style>

@endsection
