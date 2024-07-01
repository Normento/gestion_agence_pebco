<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\DepenseRealiser;
use App\Models\FraisClient;
use App\Models\FraisClientRealiser;
use App\Models\Interet;
use App\Models\InteretRealiser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrevisionController extends Controller
{
    public function interet(Request $request)
    {
        $this->validate($request, [
            'prevision' => 'required',
            'agence' => 'required',
            'periode' => 'required',
            'annee' => 'required'
        ]);
        //$date = date('Y') - 1;
        $interetId = Interet::where('code_agence', $request->agence)
            ->where('annee', $request->annee)->get('id');

        if ($request->agence == 'all') {
            $annee = $request->annee;
            $periode = $request->periode;
            $prevision = $request->prevision;
            //helper
            allAgence($annee, $periode, $prevision);
            return back()->with('success', 'Bien');
        } else {

            if ($request->prevision == 'interet') {
                if ($interetId->count() > 0) {
                    $verif = InteretRealiser::where('annee', '=', $request->annee)
                        ->where(['mois' => $request->periode, 'code_agence' => $request->agence, 'interet_id' => $interetId[0]['id']])->get();
                    /*
                    if ($verif->count() > 0 && Auth::user()->role == 1) {


                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/prevision?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());
                        //variable
                        $interet_recu_operation_client = ($response['response']->compte1 + $response['response']->compte2 + $response['response']->compte3 + $response['response']->compte4);
                        $interet_recus_operation_tiers = $response['response']->compte5;
                        $interet_verse_operation_client = ($response['response']->compte6 + $response['response']->compte7 + $response['response']->compte8);
                        $interet_verse_operation_tiers = ($response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12 + $response['response']->compte13);
                        $cout_risque_net = ($response['response']->compte14 + $response['response']->compte15 + $response['response']->compte16 + $response['response']->compte17 + $response['response']->compte18 + $response['response']->compte19 + $response['response']->compte20 + $response['response']->compte21 + $response['response']->compte22 + $response['response']->compte23 + $response['response']->compte24 + $response['response']->compte25 + +$response['response']->compte26);

                        InteretRealiser::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'interet_id' => $interetId[0]['id'],
                            'code_agence' => $request->agence,
                            'interet_recu_operation_client_realiser' => $interet_recu_operation_client,
                            'interet_recus_operation_tiers_realiser' => $interet_recus_operation_tiers,
                            'interet_verse_operation_client_realiser' => $interet_verse_operation_client,
                            'interet_verse_operation_tiers_realiser' => $interet_verse_operation_tiers,
                            'cout_risque_net_realiser' => $cout_risque_net,
                            'marge_interet_cout_risque_realiser' => ($interet_recu_operation_client + $interet_recus_operation_tiers + $interet_verse_operation_client + $interet_verse_operation_tiers + $cout_risque_net),
                            'mois' => $request->periode,
                            'annee' => $request->annee,
                        ]);
                        return back()->with('success', 'Bien');
                    } else */
                    if ($verif->count() > 0) {
                        return back()->with('error', 'Ce mois de cette année est pris en compte');
                    } else {
                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/prevision?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());
                        //variable
                        $interet_recu_operation_client = ($response['response']->compte1 + $response['response']->compte2 + $response['response']->compte3 + $response['response']->compte4);
                        $interet_recus_operation_tiers = $response['response']->compte5;
                        $interet_verse_operation_client = ($response['response']->compte6 + $response['response']->compte7 + $response['response']->compte8);
                        $interet_verse_operation_tiers = ($response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12 + $response['response']->compte13);
                        $cout_risque_net = ($response['response']->compte14 + $response['response']->compte15 + $response['response']->compte16 + $response['response']->compte17 + $response['response']->compte18 + $response['response']->compte19 + $response['response']->compte20 + $response['response']->compte21 + $response['response']->compte22 + $response['response']->compte23 + $response['response']->compte24 + $response['response']->compte25 + +$response['response']->compte26);

                        InteretRealiser::create([
                            'user_id' => Auth::user()->id,
                            'interet_id' => $interetId[0]['id'],
                            'code_agence' => $request->agence,
                            'interet_recu_operation_client_realiser' => $interet_recu_operation_client,
                            'interet_recus_operation_tiers_realiser' => $interet_recus_operation_tiers,
                            'interet_verse_operation_client_realiser' => $interet_verse_operation_client,
                            'interet_verse_operation_tiers_realiser' => $interet_verse_operation_tiers,
                            'cout_risque_net_realiser' => $cout_risque_net,
                            'marge_interet_cout_risque_realiser' => ($interet_recu_operation_client + $interet_recus_operation_tiers + $interet_verse_operation_client + $interet_verse_operation_tiers + $cout_risque_net),
                            'mois' => $request->periode,
                            'annee' => $request->annee,
                        ]);
                        return back()->with('success', 'Bien');
                    }
                } else {
                    return back()->with('error', 'Cette agence n\'a aucune information enrégistrer pour les périodes renseigner');
                }
            } elseif ($request->prevision == 'frais') {

                //recuperation des frais

                $fraisId = FraisClient::where('code_agence', $request->agence)
                    ->where('annee', $request->annee)->get('id');

                if ($fraisId->count() > 0) {


                    //verification de l'existence d'un frais pour éviter les doublons
                    $verif = FraisClientRealiser::where('annee', '=', $request->annee)
                        ->where('mois', '=', $request->periode)->where('code_agence', '=', $request->agence)->get();
                    /* if ($verif->count() > 0 && Auth::user()->role == 1) {

                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/frais_clent?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());

                        $frais_dossier_credits = ($response['response']->compte1);
                        $commissions_tontine = ($response['response']->compte2 + $response['response']->compte3);
                        $frais_tenu_compte = $response['response']->compte4;
                        $penalite_pret = ($response['response']->compte5 + $response['response']->compte6);
                        $autres_commission_recu = ($response['response']->compte7 + $response['response']->compte8 + $response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12 + $response['response']->compte13 + $response['response']->compte14 + $response['response']->compte15 + $response['response']->compte16 + $response['response']->compte17);
                        $autre_produits_exploitation = ($response['response']->compte18 + $response['response']->compte19 + $response['response']->compte20);
                        $marge_brute_cout_risque = ($frais_dossier_credits +  $commissions_tontine + $frais_tenu_compte + $penalite_pret + $autres_commission_recu + $autre_produits_exploitation);

                        FraisClientRealiser::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'frais_client_id' => $fraisId[0]['id'],
                            'code_agence' => $request->agence,
                            'frais_dossier_credits' => $frais_dossier_credits,
                            'commissions_tontine' => $commissions_tontine,
                            'frais_tenu_compte' => $frais_tenu_compte,
                            'penalite_pret' => $penalite_pret,
                            'autres_commission_recu' => $autres_commission_recu,
                            'autre_produits_exploitation' => $autre_produits_exploitation,
                            'marge_brute_cout_risque' => $marge_brute_cout_risque,
                            'mois' => $request->periode,
                            'annee' => $request->annee,

                        ]);
                        return back()->with('success', 'Bien');
                    } else */if ($verif->count() > 0) {
                        return back()->with('error', 'Ce mois de cette année est pris est pris en compte');
                    } else {
                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/frais_clent?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());

                        $frais_dossier_credits = ($response['response']->compte1);
                        $commissions_tontine = ($response['response']->compte2 + $response['response']->compte3);
                        $frais_tenu_compte = $response['response']->compte4;
                        $penalite_pret = ($response['response']->compte5 + $response['response']->compte6);
                        $autres_commission_recu = ($response['response']->compte7 + $response['response']->compte8 + $response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12 + $response['response']->compte13 + $response['response']->compte14 + $response['response']->compte15 + $response['response']->compte16 + $response['response']->compte17);
                        $autre_produits_exploitation = ($response['response']->compte18 + $response['response']->compte19 + $response['response']->compte20);
                        $marge_brute_cout_risque = ($frais_dossier_credits +  $commissions_tontine + $frais_tenu_compte + $penalite_pret + $autres_commission_recu + $autre_produits_exploitation);

                        FraisClientRealiser::create([
                            'user_id' => Auth::user()->id,
                            'frais_client_id' => $fraisId[0]['id'],
                            'code_agence' => $request->agence,
                            'frais_dossier_credits' => $frais_dossier_credits,
                            'commissions_tontine' => $commissions_tontine,
                            'frais_tenu_compte' => $frais_tenu_compte,
                            'penalite_pret' => $penalite_pret,
                            'autres_commission_recu' => $autres_commission_recu,
                            'autre_produits_exploitation' => $autre_produits_exploitation,
                            'marge_brute_cout_risque' => $marge_brute_cout_risque,
                            'mois' => $request->periode,
                            'annee' => $request->annee,

                        ]);
                        return back()->with('success', 'Bien');
                    }
                } else {
                    return back()->with('error', 'Cette agence n\'a aucune information enrégistrer pour les périodes renseigner');
                }
            } elseif ($request->prevision == 'depense') {
                $depenseId = Depense::where('code_agence', $request->agence)
                    ->where('annee', $request->annee)->get('id');

                if ($depenseId->count() > 0) {


                    $verif = DepenseRealiser::where('annee', '=', $request->annee)
                        ->where('mois', '=', $request->periode)->where('code_agence', '=', $request->agence)->get();

                    /* if ($verif->count() > 0 && Auth::user()->role == 1) {
                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/depense?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());

                        $caburant = ($response['response']->compte1 + $response['response']->compte2);
                        $eau_electricite = ($response['response']->compte3 + $response['response']->compte4 + $response['response']->compte5);
                        $depense_inform = ($response['response']->compte6 + $response['response']->compte7 + $response['response']->compte8);
                        $imprime_fourniture = ($response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12);
                        $compte61 = ($caburant + $eau_electricite + $depense_inform + $imprime_fourniture);
                        $frais_personnel = ($response['response']->compte13 + $response['response']->compte14 + $response['response']->compte15);
                        $frais_formation = ($response['response']->compte16 + $response['response']->compte17 + $response['response']->compte18);
                        $prestation_service = ($response['response']->compte19);
                        $assurance_personnel = ($response['response']->compte20 + $response['response']->compte21 + $response['response']->compte22);
                        $location_immeuble = ($response['response']->compte23 + $response['response']->compte24);
                        $assurance_bien = ($response['response']->compte25 + $response['response']->compte26 + $response['response']->compte27);
                        $frais_maintenance = ($response['response']->compte28 + $response['response']->compte29 + $response['response']->compte30);
                        $mission_reception = ($response['response']->compte31 + $response['response']->compte32 + $response['response']->compte33 + $response['response']->compte34 + $response['response']->compte35);
                        $telecom = ($response['response']->compte36 + $response['response']->compte37 + $response['response']->compte38 + $response['response']->compte39 + $response['response']->compte40);
                        $publicite_promotion = ($response['response']->compte41 + $response['response']->compte42 + $response['response']->compte43 + $response['response']->compte44 + $response['response']->compte45);
                        $charge_reunion = ($response['response']->compte46 + $response['response']->compte47 + $response['response']->compte48 + $response['response']->compte49 + $response['response']->compte50 + $response['response']->compte51 + $response['response']->compte52 + $response['response']->compte53 + $response['response']->compte54 + $response['response']->compte55 + $response['response']->compte56 + $response['response']->compte57 + $response['response']->compte58 + $response['response']->compte59 + $response['response']->compte60);
                        $prestation_exterieure = ($response['response']->compte61 + $response['response']->compte62 + $response['response']->compte63 + $response['response']->compte64 + $response['response']->compte65 + $response['response']->compte66);
                        $autre_charge = ($response['response']->compte67 + $response['response']->compte68 + $response['response']->compte69 + $response['response']->compte70 + $response['response']->compte71 + $response['response']->compte72 + $response['response']->compte73 + $response['response']->compte74 + $response['response']->compte75 + $response['response']->compte76);
                        $fond_uemoa = ($frais_personnel + $frais_formation + $prestation_service + $assurance_personnel + $location_immeuble +
                            $assurance_bien + $frais_maintenance + $mission_reception + $telecom + $publicite_promotion + $autre_charge +
                            $prestation_exterieure + $autre_charge);
                        $taxe_impot = ($response['response']->compte77 + $response['response']->compte78);
                        $personnel_cdi = ($response['response']->compte79 + $response['response']->compte80 + $response['response']->compte81 + $response['response']->compte82 + $response['response']->compte83);
                        $excedent_brute = ($compte61 + $fond_uemoa + $taxe_impot + $personnel_cdi);
                        $dotation_amortissement = ($response['response']->compte84 + $response['response']->compte85 + $response['response']->compte86 + $response['response']->compte87 + $response['response']->compte88);
                        $result_avant_impot = ($excedent_brute + $dotation_amortissement);
                        /* $impot_sur_benef = ''; 
                        $autre_charge_excep = ($response['response']->compte89 + $response['response']->compte90);
                        $autre_produit_excep = ($response['response']->compte91 + $response['response']->compte92 + $response['response']->compte93 + $response['response']->compte94 + $response['response']->compte95 + $response['response']->compte96 + $response['response']->compte97);
                        $resultat_net = ($result_avant_impot + $autre_charge_excep + $autre_produit_excep);

                        DepenseRealiser::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'depense_id' => $depenseId[0]['id'],
                            'code_agence' => $request->agence,
                            'carburants' => $caburant,
                            'eau_electricite' => $eau_electricite,
                            'depenses_informatiques' => $depense_inform,
                            'imprime_fourniture_prod_entretient' => $imprime_fourniture,
                            'compte61' => $compte61,
                            'frais_personnel' => $frais_personnel,
                            'frais_formation' => $frais_formation,
                            'prestation_service_exploitation_commerciale' => $prestation_service,
                            'assurances_personnel' => $assurance_personnel,
                            'locations_immeubles' => $location_immeuble,
                            'assurances_biens' => $assurance_bien,
                            'frais_maintenance_materiels_immeubles' => $frais_maintenance,
                            'missions_reception' => $mission_reception,
                            'telecom' => $telecom,
                            'publicite_promotions' => $publicite_promotion,
                            'charges_reunions' => $charge_reunion,
                            'prestataires_exterieurs' => $prestation_exterieure,
                            'autres_charges_externes' => $autre_charge,
                            'fond_garantie_uemoa' => $fond_uemoa,
                            'taxes_impot' => $taxe_impot,
                            'frais_personnel_cdi' => $personnel_cdi,
                            'excedent_brute_avant_amortissement' => $excedent_brute,
                            'dotation_amortissements' => $dotation_amortissement,
                            'resultat_courant_avant_impot_taxe' => $result_avant_impot,
                            'autre_charge_excep' => $autre_charge_excep,
                            'autre_produits_excep' => $autre_produit_excep,
                            'impot_sur_benefice' => 0,
                            'resultat_net' => $resultat_net,

                            'mois' => $request->periode,
                            'annee' => $request->annee,
                        ]);
                        return back()->with('success', 'success');
                    } else */if ($verif->count() > 0) {
                        return back()->with('error', 'Ce mois de cette année est pris est pris en compte');
                    } else {
                        $client = new Client();
                        $url = 'http://performances.pebcobethesda.com/api/depense?agence=' . $request->agence . '&periode=' . $request->periode . '&annee=' . $request->annee;
                        $response = $client->request("GET", $url);
                        $response = (array) json_decode($response->getBody()->getContents());

                        $caburant = ($response['response']->compte1 + $response['response']->compte2);
                        $eau_electricite = ($response['response']->compte3 + $response['response']->compte4 + $response['response']->compte5);
                        $depense_inform = ($response['response']->compte6 + $response['response']->compte7 + $response['response']->compte8);
                        $imprime_fourniture = ($response['response']->compte9 + $response['response']->compte10 + $response['response']->compte11 + $response['response']->compte12);
                        $compte61 = ($caburant + $eau_electricite + $depense_inform + $imprime_fourniture);
                        $frais_personnel = ($response['response']->compte13 + $response['response']->compte14 + $response['response']->compte15);
                        $frais_formation = ($response['response']->compte16 + $response['response']->compte17 + $response['response']->compte18);
                        $prestation_service = ($response['response']->compte19);
                        $assurance_personnel = ($response['response']->compte20 + $response['response']->compte21 + $response['response']->compte22);
                        $location_immeuble = ($response['response']->compte23 + $response['response']->compte24);
                        $assurance_bien = ($response['response']->compte25 + $response['response']->compte26 + $response['response']->compte27);
                        $frais_maintenance = ($response['response']->compte28 + $response['response']->compte29 + $response['response']->compte30);
                        $mission_reception = ($response['response']->compte31 + $response['response']->compte32 + $response['response']->compte33 + $response['response']->compte34 + $response['response']->compte35);
                        $telecom = ($response['response']->compte36 + $response['response']->compte37 + $response['response']->compte38 + $response['response']->compte39 + $response['response']->compte40);
                        $publicite_promotion = ($response['response']->compte41 + $response['response']->compte42 + $response['response']->compte43 + $response['response']->compte44 + $response['response']->compte45);
                        $charge_reunion = ($response['response']->compte46 + $response['response']->compte47 + $response['response']->compte48 + $response['response']->compte49 + $response['response']->compte50 + $response['response']->compte51 + $response['response']->compte52 + $response['response']->compte53 + $response['response']->compte54 + $response['response']->compte55 + $response['response']->compte56 + $response['response']->compte57 + $response['response']->compte58 + $response['response']->compte59 + $response['response']->compte60);
                        $prestation_exterieure = ($response['response']->compte61 + $response['response']->compte62 + $response['response']->compte63 + $response['response']->compte64 + $response['response']->compte65 + $response['response']->compte66);
                        $autre_charge = ($response['response']->compte67 + $response['response']->compte68 + $response['response']->compte69 + $response['response']->compte70 + $response['response']->compte71 + $response['response']->compte72 + $response['response']->compte73 + $response['response']->compte74 + $response['response']->compte75 + $response['response']->compte76);
                        $fond_uemoa = ($frais_personnel + $frais_formation + $prestation_service + $assurance_personnel + $location_immeuble +
                            $assurance_bien + $frais_maintenance + $mission_reception + $telecom + $publicite_promotion + $autre_charge +
                            $prestation_exterieure + $autre_charge);
                        $taxe_impot = ($response['response']->compte77 + $response['response']->compte78);
                        $personnel_cdi = ($response['response']->compte79 + $response['response']->compte80 + $response['response']->compte81 + $response['response']->compte82 + $response['response']->compte83);
                        $excedent_brute = ($compte61 + $fond_uemoa + $taxe_impot + $personnel_cdi);
                        $dotation_amortissement = ($response['response']->compte84 + $response['response']->compte85 + $response['response']->compte86 + $response['response']->compte87 + $response['response']->compte88);
                        $result_avant_impot = ($excedent_brute + $dotation_amortissement);
                        /* $impot_sur_benef = ''; */
                        $autre_charge_excep = ($response['response']->compte89 + $response['response']->compte90);
                        $autre_produit_excep = ($response['response']->compte91 + $response['response']->compte92 + $response['response']->compte93 + $response['response']->compte94 + $response['response']->compte95 + $response['response']->compte96 + $response['response']->compte97);
                        $resultat_net = ($result_avant_impot + $autre_charge_excep + $autre_produit_excep);

                        DepenseRealiser::create([
                            'user_id' => Auth::user()->id,
                            'depense_id' => $depenseId[0]['id'],
                            'code_agence' => $request->agence,
                            'carburants' => $caburant,
                            'eau_electricite' => $eau_electricite,
                            'depenses_informatiques' => $depense_inform,
                            'imprime_fourniture_prod_entretient' => $imprime_fourniture,
                            'compte61' => $compte61,
                            'frais_personnel' => $frais_personnel,
                            'frais_formation' => $frais_formation,
                            'prestation_service_exploitation_commerciale' => $prestation_service,
                            'assurances_personnel' => $assurance_personnel,
                            'locations_immeubles' => $location_immeuble,
                            'assurances_biens' => $assurance_bien,
                            'frais_maintenance_materiels_immeubles' => $frais_maintenance,
                            'missions_reception' => $mission_reception,
                            'telecom' => $telecom,
                            'publicite_promotions' => $publicite_promotion,
                            'charges_reunions' => $charge_reunion,
                            'prestataires_exterieurs' => $prestation_exterieure,
                            'autres_charges_externes' => $autre_charge,
                            'fond_garantie_uemoa' => $fond_uemoa,
                            'taxes_impot' => $taxe_impot,
                            'frais_personnel_cdi' => $personnel_cdi,
                            'excedent_brute_avant_amortissement' => $excedent_brute,
                            'dotation_amortissements' => $dotation_amortissement,
                            'resultat_courant_avant_impot_taxe' => $result_avant_impot,
                            'autre_charge_excep' => $autre_charge_excep,
                            'autre_produits_excep' => $autre_produit_excep,
                            'impot_sur_benefice' => 0,
                            'resultat_net' => $resultat_net,

                            'mois' => $request->periode,
                            'annee' => $request->annee,
                        ]);
                        return back()->with('success', 'bien');
                    }
                } else {
                    return back()->with('error', 'Cette agence n\'a aucune information enrégistrer pour les périodes renseigner');
                }
            } else {
                return back()->with('error', 'Veuillez choisir de bonnes informations');
            }
        }
    }
}
