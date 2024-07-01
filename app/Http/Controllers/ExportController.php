<?php

namespace App\Http\Controllers;

use App\Imports\BudgetImport;
use App\Models\Agence;
use App\Models\Depense;
use App\Models\FraisClient;
use App\Models\Interet;
use Dompdf\Css\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Rap2hpoutre\FastExcel\SheetCollection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use OpenSpout\Writer\Common\Creator\Style\StyleBuilder;

class ExportController extends Controller
{

    public function exportpdf(Request $request)
    {

        $this->validate($request, [
            'agence' => 'required',
            'annee' => 'required',
        ]);
        $agences = Agence::all();
        $agence = $request->agence;
        $annee = $request->annee;



        $interets = Interet::where('code_agence', $agence)->where('annee', $annee)->get();
        $frais_clients = FraisClient::where('code_agence', $agence)->where('annee', $annee)->get();
        $depenses = Depense::where('code_agence', $agence)->where('annee', $annee)->get();
        if ($request->exportation == 'pdf') {
            return PDF::loadView('admin.exportation.pdf', compact('interets', 'frais_clients', 'depenses', 'agence', 'annee', 'agences'))->setOptions(['defaultFont' => 'sans-serif'])
                ->setPaper('a4', 'portrait')
                ->setWarnings(false)
                ->stream();
            //landscape
        } elseif ($request->exportation == 'excel') {
            $agence = $request->agence;
            $annee = $request->annee;
            $interets = Interet::where('code_agence', $agence)->where('annee', $annee)
                ->select('code_agence', 'interet_recu_operation_client', 'interet_recus_operation_tiers', 'interet_verse_operation_client', 'interet_verse_operation_tiers', 'cout_risque_net', 'marge_interet_cout_risque', 'annee')->get();
            $frais_clients = FraisClient::where('code_agence', $agence)->where('annee', $annee)
                ->select('code_agence', 'frais_dossier_credits', 'commissions_tontine', 'frais_tenu_compte', 'penalite_pret', 'autres_commission_recu', 'autre_produits_exploitation', 'marge_brute_cout_risque', 'annee')->get();
            $depenses = Depense::where('code_agence', $agence)->where('annee', $annee)
                ->select('code_agence', 'carburants', 'eau_electricite', 'depenses_informatiques', 'imprime_fourniture_prod_entretient', 'compte61', 'frais_personnel', 'frais_formation', 'prestation_service_exploitation_commerciale', 'assurances_personnel', 'locations_immeubles', 'assurances_biens', 'frais_maintenance_materiels_immeubles', 'missions_reception', 'telecom', 'publicite_promotions', 'charges_reunions', 'prestataires_exterieurs', 'autres_charges_externes', 'fond_garantie_uemoa', 'taxes_impot', 'frais_personnel_cdi', 'excedent_brute_avant_amortissement', 'dotation_amortissements', 'resultat_courant_avant_impot_taxe', 'autre_charge_excep', 'autre_produits_excep', 'impot_sur_benefice', 'resultat_net', 'annee')->get();

            $sheets = new SheetCollection([
                'Intéret' => $interets,
                'Dépense' => $depenses,
                'Frais Client' => $frais_clients
            ]);
            $header = (new StyleBuilder())->setFontBold()->build();
            $style = (new StyleBuilder())
            ->setFontSize(15)
            //->setWidth(5)
            //->setHeight(1, 50)
            ->setShouldWrapText()
            ->setBackgroundColor("EDEDED")
            ->build();


            return (fastexcel($sheets))->headerStyle($style)->download("budget" . $annee .$agence. ".xlsx");
        }
    }

    public function pdfRealisation(Request $request)
    {
        $agences = Agence::all();
        $annee = Crypt::decrypt($request->get('exercice'));
        $agence = Crypt::decrypt($request->get('agence'));


        $previsionDepenses = Depense::with('depenseRealiser')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();
        $previsionFraisClients = FraisClient::with('fraisRealisers')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();
        $previsionsInterets = Interet::with('interetsRealisers')->where('code_agence', '=', $agence)->where('annee', '=', $annee)->get();

        return PDF::loadView('admin.exportation.pdfrealisation', compact('previsionDepenses', 'previsionFraisClients', 'previsionsInterets', 'agence', 'annee', 'agences'))->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a2', 'landscape')
            ->setWarnings(false)
            ->stream();
        //landscape
    }
    public function import(Request $request)
    {

        $this->validate($request, [
            'fichier' => 'required|mimes:xlsx'
        ]);
        
        if ($request->file('fichier')) {
            Excel::import(
                new BudgetImport,
                $request->file('fichier')->store('temp')
            );
            return redirect()->back()->with('success', 'Budget importé avec succès');
        }
    }
}
