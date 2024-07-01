<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Depense;
use App\Models\FraisClient;
use App\Models\Interet;
use App\Models\Region;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {

        /*  $regions  = Region::join('agences','regions.id','agences.id')
                            ->join('interets','agences.code_agence','interets.code_agence')
                            ->join('interet_realisers','agences.code_agence','interet_realisers.code_agence')
                            ->join('depenses','agences.code_agence','depenses.code_agence');

        dd($regions->get()); */
        $regions = Region::all();
        //interet
        // $regions = Region::with('interets')->get();
        $interets = Region::with('interets')->get();
        $interetRealisers =  Region::with('interetRealisers')->get();
        //frais client
        $fraisClients = Region::with('frais')->get();
        $fraisRealisers =  Region::with('fraisRealisers')->get();
        //depense
        $depenses = Region::with('depenses')->get();
        $depensesRealisers =  Region::with('depensesRealisers')->get();


        return view('admin.dashboard.index', compact('regions', 'interets', 'interetRealisers', 'fraisClients', 'fraisRealisers', 'depenses', 'depensesRealisers'));
    }
    //statistique des regions par ans

    public function regionStatistique(Request $request)
    {
        $this->validate(
            $request,
            [
                'region' => 'required',
                'annee' => 'required'
            ]
        );
        $region = $request->region;
        $annee = $request->annee;

        $regions = Region::all();
        //dd($regions,$annee);
        //interret statistique
        $interetsans = Region::join('agences', 'regions.id', 'agences.region_id')
            ->join('interets', 'agences.code_agence', 'interets.code_agence')
            // ->select('regions.nom_region','agences.region_id', 'interets.annee','interets.interet_recu_operation_client','interets.interet_recus_operation_tiers','interets.interet_verse_operation_client','interets.interet_verse_operation_tiers','interets.cout_risque_net','interets.marge_interet_cout_risque')
            ->where(['region_id' => $region, 'annee' => $annee])->get();

        $interetsrealiseans = Region::join('agences', 'regions.id', 'agences.region_id')
            ->join('interet_realisers', 'agences.code_agence', 'interet_realisers.code_agence')
            // ->select('regions.nom_region','agences.region_id', 'interets.annee','interets.interet_recu_operation_client','interets.interet_recus_operation_tiers','interets.interet_verse_operation_client','interets.interet_verse_operation_tiers','interets.cout_risque_net','interets.marge_interet_cout_risque')
            ->where(['region_id' => $region, 'annee' => $annee])->get();


        //frais
        $fraisans = Region::join('agences', 'regions.id', 'agences.region_id')
            ->join('frais_clients', 'agences.code_agence', 'frais_clients.code_agence')
            ->where(['region_id' => $region, 'annee' => $annee])->get();

        $fraisrealiserans = Region::join('agences', 'regions.id', 'agences.region_id')
            ->join('frais_client_realisers', 'agences.code_agence', 'frais_client_realisers.code_agence')
            ->where(['region_id' => $region, 'annee' => $annee])->get();

            //depense
        $depensesans = Region::join('agences', 'regions.id', 'agences.region_id')
            ->join('depenses', 'agences.code_agence', 'depenses.code_agence')
            ->where(['region_id' => $region, 'annee' => $annee])->get();

        $depenserealiserans = Region::join('agences', 'regions.id', 'agences.region_id')
        ->join('depense_realisers', 'agences.code_agence', 'depense_realisers.code_agence')
        ->where(['region_id' => $region, 'annee' => $annee])->get();

        return view('admin.dashboard.annuel', compact('regions', 'interetsans', 'interetsrealiseans', 'fraisans','fraisrealiserans', 'depensesans','depenserealiserans'));
    }

    //prevision
    public function prevision()
    {

        $mois = ['01' => 'Janvier', '02' => 'Fevrier', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Aout', '09' => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'];
        $agences = Agence::all();
        $regions = Region::all();
        $client = new Client();

        $url = 'http://performances.pebcobethesda.com/api/agence';
        $response = $client->request("GET", $url);

        $response = (array) json_decode($response->getBody()->getContents());




        return view('admin.prevision.index', compact('regions', 'mois', 'response', 'agences'));
    }

    public function filtrage(Request $request)
    {
        $agence = $request->agence;
        $annee = $request->annee;
        $agences = Agence::all();

        $previsionDepenses = Depense::with('depenseRealiser')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();
        $previsionFraisClients = FraisClient::with('fraisRealisers')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();
        $previsionsInterets = Interet::with('interetsRealisers')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();


        return view('admin.prevision.filtrage', compact('agence', 'annee', 'agences', 'previsionDepenses', 'previsionFraisClients', 'previsionsInterets'));
    }
}
