<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Depense;
use App\Models\FraisClient;
use App\Models\Interet;
use App\Models\Region;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegroupementController extends Controller
{
    public function regroupement(Request $request)
    {


        $annee = $request->annee;
        $region = $request->nom_region;
        $intitule = $request->intitule;
        $regions = Region::all();
        if ($intitule == "budget") {
            $previsionInterets = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('interets', 'agences.code_agence', 'interets.code_agence')
                ->where('interets.annee', $annee)->where('agences.region_id', $region)
                ->get();
            $previsionFraitClients = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('frais_clients', 'agences.code_agence', 'frais_clients.code_agence')
                ->where('frais_clients.annee', $annee)->where('agences.region_id', $region)
                ->get();

            $previsionDepenses = Agence::join('regions', 'agences.region_id', '=', 'regions.id')

                ->join('depenses', 'agences.code_agence', 'depenses.code_agence')
                ->where('depenses.annee', $annee)->where('agences.region_id', $region)
                ->get();

            return view('admin.regroupement.budget', compact('regions', 'previsionDepenses', 'previsionFraitClients', 'previsionInterets', 'region', 'annee'));
        } elseif ($intitule == "realisation") {

            //budget
            $previsionsInterets = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('interets', 'agences.code_agence', 'interets.code_agence')
                ->where('interets.annee', $annee)->where('agences.region_id', $region)
                ->get();
            $previsionFraisClients = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('frais_clients', 'agences.code_agence', 'frais_clients.code_agence')
                ->where('frais_clients.annee', $annee)->where('agences.region_id', $region)
                ->get();

            $previsionDepenses = Agence::join('regions', 'agences.region_id', '=', 'regions.id')

                ->join('depenses', 'agences.code_agence', 'depenses.code_agence')
                ->where('depenses.annee', $annee)->where('agences.region_id', $region)
                ->get();

            //reakisation
            $previsionDepenseRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('depense_realisers', 'agences.code_agence', 'depense_realisers.code_agence')
                ->where('depense_realisers.annee', $annee)->where('agences.region_id', $region)
                ->get();

            $previsionFraisClientRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('frais_client_realisers', 'agences.code_agence', 'frais_client_realisers.code_agence')
                ->where('frais_client_realisers.annee', $annee)->where('agences.region_id', $region)
                ->get();

            $previsionsInteretRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
                ->join('interet_realisers', 'agences.code_agence', 'interet_realisers.code_agence')
                ->where('interet_realisers.annee', $annee)->where('agences.region_id', $region)
                ->get();

            return view('admin.regroupement.realisation', compact('previsionDepenses', 'previsionFraisClients', 'previsionsInterets', 'previsionDepenseRealiser', 'previsionFraisClientRealiser', 'previsionsInteretRealiser', 'regions', 'region', 'annee'));
        } else {
            return back()->with('error', 'Veuillez choisir un intitulé');
        }
    }

    public function pdfGroupeBudget(Request $request)
    {
        $annee = Crypt::decrypt($request->get('annee'));
        $region = Crypt::decrypt($request->get('region'));

        $regions = Region::all();
        $previsionInterets = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('interets', 'agences.code_agence', 'interets.code_agence')
            // ->select('interets.annee','agences.region_id','agences.nom_agence')
            ->where('interets.annee', $annee)->where('agences.region_id', $region)
            ->get();
        $previsionFraitClients = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('frais_clients', 'agences.code_agence', 'frais_clients.code_agence')
            ->where('frais_clients.annee', $annee)->where('agences.region_id', $region)
            ->get();

        $previsionDepenses = Agence::join('regions', 'agences.region_id', '=', 'regions.id')

            ->join('depenses', 'agences.code_agence', 'depenses.code_agence')
            ->where('depenses.annee', $annee)->where('agences.region_id', $region)
            ->get();

        return PDF::loadView('admin.regroupement.pdfbudget', compact('regions', 'previsionDepenses', 'previsionFraitClients', 'previsionInterets', 'region', 'annee'))->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'portrait')
            ->setWarnings(false)
            ->stream();
    }

    public function pdfRealisationRegion(Request $request)
    {
        $annee = Crypt::decrypt($request->get('exercice'));
        $region = Crypt::decrypt($request->get('region'));
        $regions = Region::all();
        //budget
        $previsionsInterets = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('interets', 'agences.code_agence', 'interets.code_agence')
            ->where('interets.annee', $annee)->where('agences.region_id', $region)
            ->get();
        $previsionFraisClients = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('frais_clients', 'agences.code_agence', 'frais_clients.code_agence')
            ->where('frais_clients.annee', $annee)->where('agences.region_id', $region)
            ->get();

        $previsionDepenses = Agence::join('regions', 'agences.region_id', '=', 'regions.id')

            ->join('depenses', 'agences.code_agence', 'depenses.code_agence')
            ->where('depenses.annee', $annee)->where('agences.region_id', $region)
            ->get();

        //reakisation
        $previsionDepenseRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('depense_realisers', 'agences.code_agence', 'depense_realisers.code_agence')
            ->where('depense_realisers.annee', $annee)->where('agences.region_id', $region)
            ->get();

        $previsionFraisClientRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('frais_client_realisers', 'agences.code_agence', 'frais_client_realisers.code_agence')
            ->where('frais_client_realisers.annee', $annee)->where('agences.region_id', $region)
            ->get();

        $previsionsInteretRealiser = Agence::join('regions', 'agences.region_id', '=', 'regions.id')
            ->join('interet_realisers', 'agences.code_agence', 'interet_realisers.code_agence')
            ->where('interet_realisers.annee', $annee)->where('agences.region_id', $region)
            ->get();

        return PDF::loadView('admin.regroupement.pdfrealisationRegion', compact('previsionDepenses', 'previsionFraisClients', 'previsionsInterets', 'previsionDepenseRealiser', 'previsionFraisClientRealiser', 'previsionsInteretRealiser', 'regions', 'region', 'annee'))->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a2', 'landscape')
            ->setWarnings(false)
            ->stream();
    }
}
