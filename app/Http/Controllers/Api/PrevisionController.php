<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrevisionController extends Controller
{

    public function agence()
    {
        $agences = DB::connection('mysql2')->table('agence')
            ->select('COD_AGENCE')->get();

        return response()->json([
            'status' => 200,
            'response' => $agences
        ]);
    }

    public function index(Request $request)
    {

        $agence = $request->get('agence');
        $periodes = $request->get('periode');
        $annee = $request->get('annee');
        //Intérêts reçus sur opérations avec la clientèle
        $compte1 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70212)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70212' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte2 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70213)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70213' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte3 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70214)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70214' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte4 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702892)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702892' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        //intérêts reçus sur opérations avec les tiers
        $compte5 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70126)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70126' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();
        //Interêts versés sur opérations avec la clientèle
        $compte6 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 60252)
            ->where('soldperi.NUM_CPTE', 'LIKE', '60252' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte7 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 602531)
            ->where('soldperi.NUM_CPTE', 'LIKE', '602531' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte8 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6025391)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6025391' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();


        //intérêts versés sur opérations avec les tiers

        $compte9 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 60178)
            ->where('soldperi.NUM_CPTE', 'LIKE', '60178' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte10 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6019)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6019' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte11 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6089)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6089' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte12 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 60175)
            ->where('soldperi.NUM_CPTE', 'LIKE', '60175' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte13 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 60191)
            ->where('soldperi.NUM_CPTE', 'LIKE', '60191' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        //Coût du risque net

        $compte14 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66411)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66411' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte15 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66412)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66412' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte16 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6642)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6642' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte17 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6643)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6643' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte18 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 666)
            ->where('soldperi.NUM_CPTE', 'LIKE', '666' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte19 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6691)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6691' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte20 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6692)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6692' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte21 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 76411)
            ->where('soldperi.NUM_CPTE', 'LIKE', '76411' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte22 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 76412)
            ->where('soldperi.NUM_CPTE', 'LIKE', '76412' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte23 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7642)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7642' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte24 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7643)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7643' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte25 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 766)
            ->where('soldperi.NUM_CPTE', 'LIKE', '766' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte26 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 769)
            ->where('soldperi.NUM_CPTE', 'LIKE', '769' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        if ($compte1) {
            return response()->json([
                'status' => 200,
                'response' => [
                    'compte1' => $compte1->sum('SOLDE_ACTUEL'),
                    'compte2' => $compte2->sum('SOLDE_ACTUEL'),
                    'compte3' => $compte3->sum('SOLDE_ACTUEL'),
                    'compte4' => $compte4->sum('SOLDE_ACTUEL'),
                    'compte5' => $compte5->sum('SOLDE_ACTUEL'),
                    'compte6' => $compte6->sum('SOLDE_ACTUEL'),
                    'compte7' => $compte7->sum('SOLDE_ACTUEL'),
                    'compte8' => $compte8->sum('SOLDE_ACTUEL'),
                    'compte9' => $compte9->sum('SOLDE_ACTUEL'),
                    'compte10' => $compte10->sum('SOLDE_ACTUEL'),
                    'compte11' => $compte11->sum('SOLDE_ACTUEL'),
                    'compte12' => $compte12->sum('SOLDE_ACTUEL'),
                    'compte13' => $compte13->sum('SOLDE_ACTUEL'),
                    'compte14' => $compte14->sum('SOLDE_ACTUEL'),
                    'compte15' => $compte15->sum('SOLDE_ACTUEL'),
                    'compte16' => $compte16->sum('SOLDE_ACTUEL'),
                    'compte17' => $compte17->sum('SOLDE_ACTUEL'),
                    'compte18' => $compte18->sum('SOLDE_ACTUEL'),
                    'compte19' => $compte19->sum('SOLDE_ACTUEL'),
                    'compte20' => $compte20->sum('SOLDE_ACTUEL'),
                    'compte21' => $compte21->sum('SOLDE_ACTUEL'),
                    'compte22' => $compte22->sum('SOLDE_ACTUEL'),
                    'compte23' => $compte23->sum('SOLDE_ACTUEL'),
                    'compte24' => $compte24->sum('SOLDE_ACTUEL'),
                    'compte25' => $compte25->sum('SOLDE_ACTUEL'),
                    'compte26' => $compte26->sum('SOLDE_ACTUEL'),
                ]
            ]);
        }
    }


    public function  frais_clent(Request $request)
    {
        $agence = $request->get('agence');
        $periodes = $request->get('periode');
        $annee = $request->get('annee');

        $compte1 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702931)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702931' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte2 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702932)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702932' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte3 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 77114)
            ->where('soldperi.NUM_CPTE', 'LIKE', '77114' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte4 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702935)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702935' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();


        $compte5 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702891)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702891' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte6 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 77112)
            ->where('soldperi.NUM_CPTE', 'LIKE', '77112' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte7 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702912)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702912' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte8 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70292)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70292' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte9 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7029201)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7029201' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();
        $compte10 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7029202)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7029202' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte11 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7029203)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7029203' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte12 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702933)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702933' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte13 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702934)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702934' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte14 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702936)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702936' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte15 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 702937)
            ->where('soldperi.NUM_CPTE', 'LIKE', '702937' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte16 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 77111)
            ->where('soldperi.NUM_CPTE', 'LIKE', '77111' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte17 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 77113)
            ->where('soldperi.NUM_CPTE', 'LIKE', '77113' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte18 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 729)
            ->where('soldperi.NUM_CPTE', 'LIKE', '729' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte19 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 74)
            ->where('soldperi.NUM_CPTE', 'LIKE', '74' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte20 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 70191)
            ->where('soldperi.NUM_CPTE', 'LIKE', '70191' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();



        return response()->json([
            'status' => 200,
            'response' => [
                'compte1' => $compte1->sum('SOLDE_ACTUEL'),
                'compte2' => $compte2->sum('SOLDE_ACTUEL'),
                'compte3' => $compte3->sum('SOLDE_ACTUEL'),
                'compte4' => $compte4->sum('SOLDE_ACTUEL'),
                'compte5' => $compte5->sum('SOLDE_ACTUEL'),
                'compte6' => $compte6->sum('SOLDE_ACTUEL'),
                'compte7' => $compte7->sum('SOLDE_ACTUEL'),
                'compte8' => $compte8->sum('SOLDE_ACTUEL'),
                'compte9' => $compte9->sum('SOLDE_ACTUEL'),
                'compte10' => $compte10->sum('SOLDE_ACTUEL'),
                'compte11' => $compte11->sum('SOLDE_ACTUEL'),
                'compte12' => $compte12->sum('SOLDE_ACTUEL'),
                'compte13' => $compte13->sum('SOLDE_ACTUEL'),
                'compte14' => $compte14->sum('SOLDE_ACTUEL'),
                'compte15' => $compte15->sum('SOLDE_ACTUEL'),
                'compte16' => $compte16->sum('SOLDE_ACTUEL'),
                'compte17' => $compte17->sum('SOLDE_ACTUEL'),
                'compte18' => $compte18->sum('SOLDE_ACTUEL'),
                'compte19' => $compte19->sum('SOLDE_ACTUEL'),
                'compte20' => $compte20->sum('SOLDE_ACTUEL'),

            ]
        ]);
    }

    public function depense(Request $request)
    {


        $agence = $request->get('agence');
        $periodes = $request->get('periode');
        $annee = $request->get('annee');


        $compte1 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 61161)
            ->where('soldperi.NUM_CPTE', 'LIKE', '61161' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte2 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 612)
            ->where('soldperi.NUM_CPTE', 'LIKE', '612' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte3 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 611621)
            ->where('soldperi.NUM_CPTE', 'LIKE', '611621' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte4 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 611622)
            ->where('soldperi.NUM_CPTE', 'LIKE', '611622' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte5 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 611623)
            ->where('soldperi.NUM_CPTE', 'LIKE', '611623' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte6 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 61171)
            ->where('soldperi.NUM_CPTE', 'LIKE', '61171' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte7 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62143)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62143' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte8 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62144)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62144' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte9 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 61172)
            ->where('soldperi.NUM_CPTE', 'LIKE', '61172' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte10 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 61173)
            ->where('soldperi.NUM_CPTE', 'LIKE', '61173' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte11 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6112)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6112' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte12 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 61174)
            ->where('soldperi.NUM_CPTE', 'LIKE', '61174' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte13 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6221)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6221' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte14 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62211)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62211' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();


        $compte15 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622211)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622211' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte16 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62171)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62171' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte17 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62172)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62172' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte18 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62173)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62173' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte19 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622214)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622214' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte20 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62154)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62154' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte21 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62155)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62155' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte22 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62156)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62156' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte23 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6212)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6212' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte24 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6213)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6213' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte25 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62151)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62151' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte26 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62152)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62152' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte27 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62153)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62153' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte28 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62141)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62141' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte29 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62142)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62142' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte30 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62145)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62145' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte31 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6224)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6224' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte32 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6225)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6225' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte33 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62261)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62261' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte34 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62262)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62262' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte35 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62263)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62263' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte36 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62271)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62271' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte37 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62272)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62272' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte38 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62278)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62278' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte39 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62334)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62334' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte40 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62279)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62279' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte41 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62231)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62231' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte42 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62232)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62232' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();


        $compte43 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62235)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62235' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte44 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62236)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62236' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte45 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62237)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62237' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte46 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623311)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623311' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte47 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623312)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623312' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte48 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62332)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62332' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte49 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623321)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623321' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte50 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623322)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623322' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte51 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62333)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62333' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte52 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623331)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623331' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte53 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623341)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623341' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte54 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62335)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62335' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte55 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623351)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623351' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte56 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623391)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623391' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte57 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623392)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623392' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte58 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623393)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623393' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte59 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623394)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623394' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte60 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623396)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623396' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte61 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622212)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622212' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte62 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622213)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622213' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte63 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622215)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622215' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte64 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 622218)
            ->where('soldperi.NUM_CPTE', 'LIKE', '622218' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte65 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623101)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623101' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte66 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6239213)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6239213' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte67 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62282)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62282' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte68 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6216)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6216' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte69 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62181)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62181' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte70 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62182)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62182' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte71 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62233)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62233' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte72 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62234)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62234' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte73 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62281)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62281' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte74 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 62391)
            ->where('soldperi.NUM_CPTE', 'LIKE', '62391' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte75 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 623928)
            ->where('soldperi.NUM_CPTE', 'LIKE', '623928' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte76 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 60192)
            ->where('soldperi.NUM_CPTE', 'LIKE', '60192' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte77 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 63)
            ->where('soldperi.NUM_CPTE', 'LIKE', '63' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte78 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 69)
            ->where('soldperi.NUM_CPTE', 'LIKE', '69' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte79 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 64)
            ->where('soldperi.NUM_CPTE', 'LIKE', '64' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte80 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6671)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6671' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte81 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6672)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6672' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte82 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7671)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7671' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte83 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7672)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7672' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte84 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66111)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66111' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte85 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66112)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66112' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte86 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66121)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66121' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte87 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 66122)
            ->where('soldperi.NUM_CPTE', 'LIKE', '66122' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte88 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 662)
            ->where('soldperi.NUM_CPTE', 'LIKE', '662' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte89 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 67)
            ->where('soldperi.NUM_CPTE', 'LIKE', '67' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte90 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 6061)
            ->where('soldperi.NUM_CPTE', 'LIKE', '6061' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte91 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 761)
            ->where('soldperi.NUM_CPTE', 'LIKE', '761' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte92 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7714)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7714' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte93 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7717)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7717' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte94 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7719)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7719' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte95 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7721)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7721' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte96 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7722)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7722' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        $compte97 = DB::connection('mysql2')->table('periode')
            ->join('comptes', 'periode.COD_AGENCE', '=', 'comptes.COD_AGENCE')
            ->join('soldperi', 'periode.KP_PERIODE', '=', 'soldperi.KP_PERIODE')
            ->join('exercice', 'periode.KP_EXERCICE', '=', 'exercice.KP_EXERCICE')
            ->select('soldperi.SOLDE_ACTUEL')
            ->where('periode.PERIODE', $periodes)
            ->where('periode.ETAT_CLOTURE', 'D')
            ->where('comptes.CPTE_GAL', '=', 7723)
            ->where('soldperi.NUM_CPTE', 'LIKE', '7723' . '%')
            ->where('exercice.EXERCICE', $annee)
            ->where('periode.COD_AGENCE', $agence)->get();

        return response()->json([
            'status' => 200,
            'response' => [
                'compte1' => $compte1->sum('SOLDE_ACTUEL'),
                'compte2' => $compte2->sum('SOLDE_ACTUEL'),
                'compte3' => $compte3->sum('SOLDE_ACTUEL'),
                'compte4' => $compte4->sum('SOLDE_ACTUEL'),
                'compte5' => $compte5->sum('SOLDE_ACTUEL'),
                'compte6' => $compte6->sum('SOLDE_ACTUEL'),
                'compte7' => $compte7->sum('SOLDE_ACTUEL'),
                'compte8' => $compte8->sum('SOLDE_ACTUEL'),
                'compte9' => $compte9->sum('SOLDE_ACTUEL'),
                'compte10' => $compte10->sum('SOLDE_ACTUEL'),
                'compte11' => $compte11->sum('SOLDE_ACTUEL'),
                'compte12' => $compte12->sum('SOLDE_ACTUEL'),
                'compte13' => $compte13->sum('SOLDE_ACTUEL'),
                'compte14' => $compte14->sum('SOLDE_ACTUEL'),
                'compte15' => $compte15->sum('SOLDE_ACTUEL'),
                'compte16' => $compte16->sum('SOLDE_ACTUEL'),
                'compte17' => $compte17->sum('SOLDE_ACTUEL'),
                'compte18' => $compte18->sum('SOLDE_ACTUEL'),
                'compte19' => $compte19->sum('SOLDE_ACTUEL'),
                'compte20' => $compte20->sum('SOLDE_ACTUEL'),
                'compte21' => $compte21->sum('SOLDE_ACTUEL'),
                'compte22' => $compte22->sum('SOLDE_ACTUEL'),
                'compte23' => $compte23->sum('SOLDE_ACTUEL'),
                'compte24' => $compte24->sum('SOLDE_ACTUEL'),
                'compte25' => $compte25->sum('SOLDE_ACTUEL'),
                'compte26' => $compte26->sum('SOLDE_ACTUEL'),
                'compte27' => $compte27->sum('SOLDE_ACTUEL'),
                'compte28' => $compte28->sum('SOLDE_ACTUEL'),
                'compte29' => $compte29->sum('SOLDE_ACTUEL'),
                'compte30' => $compte30->sum('SOLDE_ACTUEL'),
                'compte31' => $compte31->sum('SOLDE_ACTUEL'),
                'compte32' => $compte32->sum('SOLDE_ACTUEL'),
                'compte33' => $compte33->sum('SOLDE_ACTUEL'),
                'compte34' => $compte34->sum('SOLDE_ACTUEL'),
                'compte35' => $compte35->sum('SOLDE_ACTUEL'),
                'compte36' => $compte36->sum('SOLDE_ACTUEL'),
                'compte37' => $compte37->sum('SOLDE_ACTUEL'),
                'compte38' => $compte38->sum('SOLDE_ACTUEL'),
                'compte39' => $compte39->sum('SOLDE_ACTUEL'),
                'compte40' => $compte40->sum('SOLDE_ACTUEL'),
                'compte41' => $compte41->sum('SOLDE_ACTUEL'),
                'compte42' => $compte42->sum('SOLDE_ACTUEL'),
                'compte43' => $compte43->sum('SOLDE_ACTUEL'),
                'compte44' => $compte44->sum('SOLDE_ACTUEL'),
                'compte45' => $compte45->sum('SOLDE_ACTUEL'),
                'compte46' => $compte46->sum('SOLDE_ACTUEL'),
                'compte47' => $compte47->sum('SOLDE_ACTUEL'),
                'compte48' => $compte48->sum('SOLDE_ACTUEL'),
                'compte49' => $compte49->sum('SOLDE_ACTUEL'),
                'compte50' => $compte50->sum('SOLDE_ACTUEL'),
                'compte51' => $compte51->sum('SOLDE_ACTUEL'),
                'compte52' => $compte52->sum('SOLDE_ACTUEL'),
                'compte53' => $compte53->sum('SOLDE_ACTUEL'),
                'compte54' => $compte54->sum('SOLDE_ACTUEL'),
                'compte55' => $compte55->sum('SOLDE_ACTUEL'),
                'compte56' => $compte56->sum('SOLDE_ACTUEL'),
                'compte57' => $compte57->sum('SOLDE_ACTUEL'),
                'compte58' => $compte58->sum('SOLDE_ACTUEL'),
                'compte59' => $compte59->sum('SOLDE_ACTUEL'),
                'compte60' => $compte60->sum('SOLDE_ACTUEL'),
                'compte61' => $compte61->sum('SOLDE_ACTUEL'),
                'compte62' => $compte62->sum('SOLDE_ACTUEL'),
                'compte63' => $compte63->sum('SOLDE_ACTUEL'),
                'compte64' => $compte64->sum('SOLDE_ACTUEL'),
                'compte65' => $compte65->sum('SOLDE_ACTUEL'),
                'compte66' => $compte66->sum('SOLDE_ACTUEL'),
                'compte67' => $compte67->sum('SOLDE_ACTUEL'),
                'compte68' => $compte68->sum('SOLDE_ACTUEL'),
                'compte69' => $compte69->sum('SOLDE_ACTUEL'),
                'compte70' => $compte70->sum('SOLDE_ACTUEL'),
                'compte71' => $compte71->sum('SOLDE_ACTUEL'),
                'compte72' => $compte72->sum('SOLDE_ACTUEL'),
                'compte73' => $compte73->sum('SOLDE_ACTUEL'),
                'compte74' => $compte74->sum('SOLDE_ACTUEL'),
                'compte75' => $compte75->sum('SOLDE_ACTUEL'),
                'compte76' => $compte76->sum('SOLDE_ACTUEL'),
                'compte77' => $compte77->sum('SOLDE_ACTUEL'),
                'compte78' => $compte78->sum('SOLDE_ACTUEL'),
                'compte79' => $compte79->sum('SOLDE_ACTUEL'),
                'compte80' => $compte80->sum('SOLDE_ACTUEL'),
                'compte81' => $compte81->sum('SOLDE_ACTUEL'),
                'compte82' => $compte82->sum('SOLDE_ACTUEL'),
                'compte83' => $compte83->sum('SOLDE_ACTUEL'),
                'compte84' => $compte84->sum('SOLDE_ACTUEL'),
                'compte85' => $compte85->sum('SOLDE_ACTUEL'),
                'compte86' => $compte86->sum('SOLDE_ACTUEL'),
                'compte87' => $compte87->sum('SOLDE_ACTUEL'),
                'compte88' => $compte88->sum('SOLDE_ACTUEL'),
                'compte89' => $compte89->sum('SOLDE_ACTUEL'),
                'compte90' => $compte90->sum('SOLDE_ACTUEL'),
                'compte91' => $compte91->sum('SOLDE_ACTUEL'),
                'compte92' => $compte92->sum('SOLDE_ACTUEL'),
                'compte93' => $compte93->sum('SOLDE_ACTUEL'),
                'compte94' => $compte94->sum('SOLDE_ACTUEL'),
                'compte95' => $compte95->sum('SOLDE_ACTUEL'),
                'compte96' => $compte96->sum('SOLDE_ACTUEL'),
                'compte97' => $compte97->sum('SOLDE_ACTUEL'),


            ]
        ]);
    }
}
