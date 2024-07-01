<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1 || Auth::user()->role == 0) {
            $depenses = Depense::orderBy('id', 'desc')->paginate(10);
        } else {
            $depenses = Depense::where('code_agence', Auth::user()->code_agence)->paginate(10);
        }


        return view('admin.depense.index', compact('depenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::where('nom_agence','!=','Direction')->get();
        return view('admin.depense.create', compact('agences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'code_agence' => 'required',
            'carburants' => 'required|integer',
            'eau_electricite' => 'required|integer',
            'depenses_informatiques' => 'required|integer',
            'imprime_fourniture_prod_entretient' => 'required|integer',
            'frais_personnel' => 'required|integer',
            'frais_formation' => 'required|integer',
            'prestation_service_exploitation_commerciale' => 'required|integer',
            'assurances_personnel' => 'required|integer',
            'locations_immeubles' => 'required|integer',
            'assurances_biens' => 'required|integer',
            'frais_maintenance_materiels_immeubles' => 'required|integer',
            'missions_reception' => 'required|integer',
            'telecom' => 'required|integer',
            'publicite_promotions' => 'required|integer',
            'charges_reunions' => 'required|integer',
            'prestataires_exterieurs' => 'required|integer',
            'autres_charges_externes' => 'required|integer',
            'dotation_amortissements' => 'required|integer',
            'autre_charge_excep' => 'required|integer',
            'autre_produits_excep' => 'required|integer',
            'impot_taxes' => 'required|integer',
            'frais_personnel_cdi' => 'required|integer',
            'impot_sur_benefice'=> 'required',
            'annee' => 'required'
        ]);
        $depense = Depense::where('code_agence', $request->code_agence)->where('annee', $request->annee)->get();
        if ($depense && $depense->count() > 0) {
            return back()->with('error', "Il y a une prevision qui est déjà enrégistrer pour cette agence pour l'année" . $request->annee);
        } else {
            $compte61 = ($request->carburants + $request->eau_electricite + $request->depenses_informatiques + $request->imprime_fourniture_prod_entretient);
            $uemoa = ($request->autres_charges_externes + $request->charges_reunions + $request->prestataires_exterieurs + $request->frais_personnel + $request->frais_formation + $request->prestation_service_exploitation_commerciale + $request->assurances_personnel + $request->locations_immeubles + $request->assurances_biens + $request->frais_maintenance_materiels_immeubles + $request->missions_reception + $request->telecom + $request->publicite_promotions);
            $excedent_brute = $compte61 + $uemoa + $request->impot_taxes + $request->frais_personnel_cdi;
            $resulta_courant = $excedent_brute +  $request->dotation_amortissements;
            $resultat_net = $resulta_courant + $request->autre_charge_excep + $request->autre_produits_excep + $request->impot_sur_benefice;
            Depense::create([
                'user_id' => Auth::user()->id,
                'code_agence' => $request->code_agence,
                'carburants' => $request->carburants,
                'eau_electricite' => $request->eau_electricite,
                'depenses_informatiques' => $request->depenses_informatiques,
                'imprime_fourniture_prod_entretient' => $request->imprime_fourniture_prod_entretient,
                'compte61' => $compte61,
                'frais_personnel' => $request->frais_personnel,
                'frais_formation' => $request->frais_formation,
                'prestation_service_exploitation_commerciale' => $request->prestation_service_exploitation_commerciale,
                'assurances_personnel' => $request->assurances_personnel,
                'locations_immeubles' => $request->locations_immeubles,
                'assurances_biens' => $request->assurances_biens,
                'frais_maintenance_materiels_immeubles' => $request->frais_maintenance_materiels_immeubles,
                'missions_reception' => $request->missions_reception,
                'telecom' => $request->telecom,
                'publicite_promotions' => $request->publicite_promotions,
                'charges_reunions' => $request->charges_reunions,
                'prestataires_exterieurs' => $request->prestataires_exterieurs,
                'autres_charges_externes' => $request->autres_charges_externes,
                'fond_garantie_uemoa' => $uemoa,
                'excedent_brute_avant_amortissement' => $excedent_brute,
                'dotation_amortissements' => $request->dotation_amortissements,
                'resultat_courant_avant_impot_taxe' => $resulta_courant,
                'autre_charge_excep' => $request->autre_charge_excep,
                'autre_produits_excep' => $request->autre_produits_excep,
                'frais_personnel_cdi' => $request->frais_personnel_cdi,
                'taxes_impot' => $request->impot_taxes,
                'impot_sur_benefice' => $request->impot_sur_benefice,
                'resultat_net' => $resultat_net,
                'annee' => $request->annee,
            ]);

            return redirect()->route('depense.index')->with('success', "Prévision enrégistrée avec succès");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {

        return view('admin.depense.show', compact('depense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {
        $agences = Agence::all();
        return view('admin.depense.edit', compact('depense', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {
        $this->validate($request, [
            'carburants' => 'required',
            'eau_electricite' => 'required',
            'depenses_informatiques' => 'required',
            'imprime_fourniture_prod_entretient' => 'required',
            'frais_personnel' => 'required',
            'frais_formation' => 'required',
            'prestation_service_exploitation_commerciale' => 'required',
            'assurances_personnel' => 'required',
            'locations_immeubles' => 'required',
            'assurances_biens' => 'required',
            'frais_maintenance_materiels_immeubles' => 'required',
            'missions_reception' => 'required',
            'telecom' => 'required',
            'publicite_promotions' => 'required',
            'charges_reunions' => 'required',
            'prestataires_exterieurs' => 'required',
            'autres_charges_externes' => 'required',
            'dotation_amortissements' => 'required',
            'autre_charge_excep' => 'required',
            'autre_produits_excep' => 'required',
            'impot_taxes' => 'required',
            'frais_personnel_cdi' => 'required',
        ]);

        $compte61 = ($request->carburants + $request->eau_electricite + $request->depenses_informatiques + $request->imprime_fourniture_prod_entretient);
        $uemoa = ($request->autres_charges_externes + $request->charges_reunions + $request->prestataires_exterieurs + $request->frais_personnel + $request->frais_formation + $request->prestation_service_exploitation_commerciale + $request->assurances_personnel + $request->locations_immeubles + $request->assurances_biens + $request->frais_maintenance_materiels_immeubles + $request->missions_reception + $request->telecom + $request->publicite_promotions);
        $excedent_brute = $compte61 + $uemoa + $request->impot_taxes + $request->frais_personnel_cdi;
        $resulta_courant = $excedent_brute +  $request->dotation_amortissements;
        $resultat_net = $resulta_courant + $request->autre_charge_excep + $request->autre_produits_excep + $request->impot_sur_benefice;

          $depense->carburants = $request->carburants;
          $depense->eau_electricite = $request->eau_electricite;
          $depense->depenses_informatiques = $request->depenses_informatiques;
          $depense->imprime_fourniture_prod_entretient = $request->imprime_fourniture_prod_entretient;
            $depense->compte61 = $compte61;
            $depense->frais_personnel = $request->frais_personnel;
            $depense->frais_formation = $request->frais_formation;
            $depense->prestation_service_exploitation_commerciale = $request->prestation_service_exploitation_commerciale;
            $depense->assurances_personnel = $request->assurances_personnel;
            $depense->locations_immeubles = $request->locations_immeubles;
            $depense->assurances_biens = $request->assurances_biens;
            $depense->frais_maintenance_materiels_immeubles = $request->frais_maintenance_materiels_immeubles;
            $depense->missions_reception = $request->missions_reception;
            $depense->telecom = $request->telecom;
            $depense->publicite_promotions = $request->publicite_promotions;
            $depense->charges_reunions = $request->charges_reunions;
            $depense->prestataires_exterieurs = $request->prestataires_exterieurs;
            $depense->autres_charges_externes = $request->autres_charges_externes;
            $depense->fond_garantie_uemoa = $uemoa;
            $depense->excedent_brute_avant_amortissement = $excedent_brute;
            $depense->dotation_amortissements = $request->dotation_amortissements;
            $depense->resultat_courant_avant_impot_taxe = $resulta_courant;
            $depense->autre_charge_excep = $request->autre_charge_excep;
            $depense->autre_produits_excep = $request->autre_produits_excep;
            $depense->frais_personnel_cdi = $request->frais_personnel_cdi;
            $depense->taxes_impot = $request->impot_taxes;
            $depense->impot_sur_benefice = $request->impot_sur_benefice;
            $depense->resultat_net = $resultat_net;

            $depense->save();

       /*  $depense->update($request->all()); */

        return redirect()->route('depense.index')->with('success', 'Information mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        if ($depense) {
            $depense->delete();
            return back()->with('success', 'Prévision supprimée avec succès');
        }
    }
}
