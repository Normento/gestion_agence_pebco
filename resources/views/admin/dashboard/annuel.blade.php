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
        <div class="col-lg-12">
            <div class="border-head">
                <h3><i class="fa fa-angle-right"></i> Statisique annuelle</h3>
            </div>
            <!-- CHART PANELS -->
            <div class="row">
                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">

                            <h5 style="font-size: 20px;">Interet</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{$interetsans->sum('interet_recu_operation_client') + $interetsans->sum('interet_recus_operation_tiers') + $interetsans->sum('interet_verse_operation_client') + $interetsans->sum('interet_verse_operation_tiers') + $interetsans->sum('cout_risque_net') + $interetsans->sum('marge_interet_cout_risque')}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($interetsrealiseans->sum('interet_recu_operation_client_realiser') + $interetsrealiseans->sum('interet_recus_operation_tiers_realiser') + $interetsrealiseans->sum('interet_verse_operation_client_realiser') + $interetsrealiseans->sum('interet_verse_operation_tiers_realiser') + $interetsrealiseans->sum('cout_risque_net_realiser') + $interetsrealiseans->sum('marge_interet_cout_risque_realiser'))/ 1000}}</h1>
                            @if (($interetsans->sum('interet_recu_operation_client') + $interetsans->sum('interet_recus_operation_tiers') + $interetsans->sum('interet_verse_operation_client') + $interetsans->sum('interet_verse_operation_tiers') + $interetsans->sum('cout_risque_net') + $interetsans->sum('marge_interet_cout_risque')) > 0)
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux: {{((($interetsrealiseans->sum('interet_recu_operation_client_realiser') + $interetsrealiseans->sum('interet_recus_operation_tiers_realiser') + $interetsrealiseans->sum('interet_verse_operation_client_realiser') + $interetsrealiseans->sum('interet_verse_operation_tiers_realiser') + $interetsrealiseans->sum('cout_risque_net_realiser') + $interetsrealiseans->sum('marge_interet_cout_risque_realiser'))/ 1000) / ($interetsans->sum('interet_recu_operation_client') + $interetsans->sum('interet_recus_operation_tiers') + $interetsans->sum('interet_verse_operation_client') + $interetsans->sum('interet_verse_operation_tiers') + $interetsans->sum('cout_risque_net') + $interetsans->sum('marge_interet_cout_risque'))) * 100}}%
                                @else
                                <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux: 0 %
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


                <!-- frais client -->


                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">

                            <h5 style="font-size: 20px;">Frais Client</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{$fraisans->sum('frais_dossier_credits') + $fraisans->sum('commissions_tontine') + $fraisans->sum('frais_tenu_compte') + $fraisans->sum('penalite_pret') + $fraisans->sum('autres_commission_recu') + $fraisans->sum('autre_produits_exploitation') + $fraisans->sum('marge_brute_cout_risque')}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($fraisrealiserans->sum('frais_dossier_credits') + $fraisrealiserans->sum('commissions_tontine') + $fraisrealiserans->sum('frais_tenu_compte') + $fraisrealiserans->sum('penalite_pret') + $fraisrealiserans->sum('autres_commission_recu') + $fraisrealiserans->sum('autre_produits_exploitation') + $fraisrealiserans->sum('marge_brute_cout_risque'))/ 1000}}</h1>
                            @if (($fraisans->sum('frais_dossier_credits') + $fraisans->sum('commissions_tontine') + $fraisans->sum('frais_tenu_compte') + $fraisans->sum('penalite_pret') + $fraisans->sum('autres_commission_recu') + $fraisans->sum('autre_produits_exploitation') + $fraisans->sum('marge_brute_cout_risque')) > 0)
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux:{{((($fraisrealiserans->sum('frais_dossier_credits') + $fraisrealiserans->sum('commissions_tontine') + $fraisrealiserans->sum('frais_tenu_compte') + $fraisrealiserans->sum('penalite_pret') + $fraisrealiserans->sum('autres_commission_recu') + $fraisrealiserans->sum('autre_produits_exploitation') + $fraisrealiserans->sum('marge_brute_cout_risque'))/ 1000) / ($fraisans->sum('frais_dossier_credits') + $fraisans->sum('commissions_tontine') + $fraisans->sum('frais_tenu_compte') + $fraisans->sum('penalite_pret') + $fraisans->sum('autres_commission_recu') + $fraisans->sum('autre_produits_exploitation') + $fraisans->sum('marge_brute_cout_risque'))) *100}} %
                                @else
                                <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux: 0 %
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

                <!-- Depense -->

                <div class="col-md-4 col-sm-4 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">

                            <h5 style="font-size: 20px;">Dépense</h5>
                        </div>
                        <div class="col-sm-6 col-xs-6 goleft">

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Budget:{{$depensesans->sum('carburants') +$depensesans->sum('eau_electricite') + $depensesans->sum('depenses_informatiques') + $depensesans->sum('imprime_fourniture_prod_entretient') + $depensesans->sum('compte61') + $depensesans->sum('frais_personnel') + $depensesans->sum('frais_formation') + $depensesans->sum('prestation_service_exploitation_commerciale') + $depensesans->sum('assurances_personnel') + $depensesans->sum('locations_immeubles') +
                            $depensesans->sum('assurances_biens') + $depensesans->sum('frais_maintenance_materiels_immeubles') + $depensesans->sum('missions_reception') + $depensesans->sum('telecom') + $depensesans->sum('publicite_promotions') + $depensesans->sum('charges_reunions') + $depensesans->sum('prestataires_exterieurs') + $depensesans->sum('autres_charges_externes') + $depensesans->sum('fond_garantie_uemoa') + $depensesans->sum('taxes_impot') + $depensesans->sum('frais_personnel_cdi') + $depensesans->sum('excedent_brute_avant_amortissement') +
                            $depensesans->sum('dotation_amortissements') + $depensesans->sum('resultat_courant_avant_impot_taxe') + $depensesans->sum('autre_charge_excep') + $depensesans->sum('autre_produits_excep') + $depensesans->sum('impot_sur_benefice') + $depensesans->sum('resultat_net')}}</h1>
                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Réalisation:{{($depenserealiserans->sum('carburants') +$depenserealiserans->sum('eau_electricite') + $depenserealiserans->sum('depenses_informatiques') + $depenserealiserans->sum('imprime_fourniture_prod_entretient') + $depenserealiserans->sum('compte61') + $depenserealiserans->sum('frais_personnel') + $depenserealiserans->sum('frais_formation') + $depenserealiserans->sum('prestation_service_exploitation_commerciale') + $depenserealiserans->sum('assurances_personnel') + $depenserealiserans->sum('locations_immeubles') +
                            $depenserealiserans->sum('assurances_biens') + $depenserealiserans->sum('frais_maintenance_materiels_immeubles') + $depenserealiserans->sum('missions_reception') + $depenserealiserans->sum('telecom') + $depenserealiserans->sum('publicite_promotions') + $depenserealiserans->sum('charges_reunions') + $depenserealiserans->sum('prestataires_exterieurs') + $depenserealiserans->sum('autres_charges_externes') + $depenserealiserans->sum('fond_garantie_uemoa') + $depenserealiserans->sum('taxes_impot') + $depenserealiserans->sum('frais_personnel_cdi') + $depenserealiserans->sum('excedent_brute_avant_amortissement') +
                            $depenserealiserans->sum('dotation_amortissements') + $depenserealiserans->sum('resultat_courant_avant_impot_taxe') + $depenserealiserans->sum('autre_charge_excep') + $depenserealiserans->sum('autre_produits_excep') + $depenserealiserans->sum('impot_sur_benefice') + $depenserealiserans->sum('resultat_net'))/ 1000}}</h1>
                            @if (($depensesans->sum('carburants') +$depensesans->sum('eau_electricite') + $depensesans->sum('depenses_informatiques')) > 0)

                            <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux: {{((($depenserealiserans->sum('carburants') +$depenserealiserans->sum('eau_electricite') + $depenserealiserans->sum('depenses_informatiques') + $depenserealiserans->sum('imprime_fourniture_prod_entretient') + $depenserealiserans->sum('compte61') + $depenserealiserans->sum('frais_personnel') + $depenserealiserans->sum('frais_formation') + $depenserealiserans->sum('prestation_service_exploitation_commerciale') + $depenserealiserans->sum('assurances_personnel') + $depenserealiserans->sum('locations_immeubles') +
                            $depenserealiserans->sum('assurances_biens') + $depenserealiserans->sum('frais_maintenance_materiels_immeubles') + $depenserealiserans->sum('missions_reception') + $depenserealiserans->sum('telecom') + $depenserealiserans->sum('publicite_promotions') + $depenserealiserans->sum('charges_reunions') + $depenserealiserans->sum('prestataires_exterieurs') + $depenserealiserans->sum('autres_charges_externes') + $depenserealiserans->sum('fond_garantie_uemoa') + $depenserealiserans->sum('taxes_impot') + $depenserealiserans->sum('frais_personnel_cdi') + $depenserealiserans->sum('excedent_brute_avant_amortissement') +
                            $depenserealiserans->sum('dotation_amortissements') + $depenserealiserans->sum('resultat_courant_avant_impot_taxe') + $depenserealiserans->sum('autre_charge_excep') + $depenserealiserans->sum('autre_produits_excep') + $depenserealiserans->sum('impot_sur_benefice') + $depenserealiserans->sum('resultat_net'))/ 1000)
                             / ($depensesans->sum('carburants') +$depensesans->sum('eau_electricite') + $depensesans->sum('depenses_informatiques') + $depensesans->sum('imprime_fourniture_prod_entretient') + $depensesans->sum('compte61') + $depensesans->sum('frais_personnel') + $depensesans->sum('frais_formation') + $depensesans->sum('prestation_service_exploitation_commerciale') + $depensesans->sum('assurances_personnel') + $depensesans->sum('locations_immeubles') +
                            $depensesans->sum('assurances_biens') + $depensesans->sum('frais_maintenance_materiels_immeubles') + $depensesans->sum('missions_reception') + $depensesans->sum('telecom') + $depensesans->sum('publicite_promotions') + $depensesans->sum('charges_reunions') + $depensesans->sum('prestataires_exterieurs') + $depensesans->sum('autres_charges_externes') + $depensesans->sum('fond_garantie_uemoa') + $depensesans->sum('taxes_impot') + $depensesans->sum('frais_personnel_cdi') + $depensesans->sum('excedent_brute_avant_amortissement') +
                            $depensesans->sum('dotation_amortissements') + $depensesans->sum('resultat_courant_avant_impot_taxe') + $depensesans->sum('autre_charge_excep') + $depensesans->sum('autre_produits_excep') + $depensesans->sum('impot_sur_benefice') + $depensesans->sum('resultat_net'))) * 100}} %
                                @else
                                <h1 id="serverstatus01" height="120" width="120" style="font-size: 20px;">Taux: 0 %
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
            </div>
        </div>

    </div>






    <!--
    <div class="border-head">
        <h3><i class="fa fa-angle-right"></i> Statistique après collecte</h3>
    </div>
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
    </div>
    </div>
    </div> -->
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
