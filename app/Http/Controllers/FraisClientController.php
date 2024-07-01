<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\FraisClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FraisClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1 || Auth::user()->role == 0) {
            $fraisClients = FraisClient::orderBy('id', 'desc')->paginate(10);
        } else {
            $fraisClients = FraisClient::where('code_agence', Auth::user()->code_agence)->paginate(10);
        }

        return view('admin.frais_client.index', compact('fraisClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::where('nom_agence','!=','Direction')->get();
        return view('admin.frais_client.create', compact('agences'));
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
            'frais_dossier_credits' => 'required|integer',
            'commissions_tontine' => 'required|integer',
            'frais_tenu_compte' => 'required|integer',
            'penalite_pret' => 'required|integer',
            'autres_commission_recu' => 'required|integer',
            'autre_produits_exploitation' => 'required|integer',
            'code_agence' => 'required',
            'annee' => 'required'
        ]);

        $fraisClient = FraisClient::where('code_agence', $request->code_agence)
            ->where('annee', $request->annee)->get();
        if ($fraisClient && $fraisClient->count() > 0) {
            return back()->with('error', "Il y a une prevision qui est déjà enrégistrer pour cette agence pour l'année" . $request->annee);
        } else {
            FraisClient::create([
                'user_id' => Auth::user()->id,
                'code_agence' => $request->code_agence,
                'frais_dossier_credits' => $request->frais_dossier_credits,
                'commissions_tontine' => $request->commissions_tontine,
                'frais_tenu_compte' => $request->frais_tenu_compte,
                'penalite_pret' => $request->penalite_pret,
                'autres_commission_recu' => $request->autres_commission_recu,
                'autre_produits_exploitation' => $request->autre_produits_exploitation,
                'marge_brute_cout_risque' => ($request->autre_produits_exploitation + $request->autres_commission_recu + $request->penalite_pret + $request->frais_dossier_credits  + $request->commissions_tontine + $request->frais_tenu_compte),
                'annee' => $request->annee,
            ]);

            return redirect()->route('fraisClient.index',)->with('success', 'Frais client enrégistré avec succès');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FraisClient  $fraisClient
     * @return \Illuminate\Http\Response
     */
    public function show(FraisClient $fraisClient)
    {
        return view('admin.frais_client.show', compact('fraisClient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FraisClient  $fraisClient
     * @return \Illuminate\Http\Response
     */
    public function edit(FraisClient $fraisClient)
    {
        $agences = Agence::all();

        return view('admin.frais_client.edit', compact('agences', 'fraisClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FraisClient  $fraisClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FraisClient $fraisClient)
    {
        $this->validate($request, [
            'frais_dossier_credits' => 'required',
            'commissions_tontine' => 'required',
            'frais_tenu_compte' => 'required',
            'penalite_pret' => 'required',
            'autres_commission_recu' => 'required',
            'autre_produits_exploitation' => 'required',
        ]);

        $fraisClient->frais_dossier_credits = $request->frais_dossier_credits;
        $fraisClient->commissions_tontine = $request->commissions_tontine;
        $fraisClient->frais_tenu_compte = $request->frais_tenu_compte;
        $fraisClient->penalite_pret = $request->penalite_pret;
        $fraisClient->autres_commission_recu = $request->autres_commission_recu;
        $fraisClient->autre_produits_exploitation = $request->autre_produits_exploitation;
        $fraisClient->marge_brute_cout_risque = ($request->autre_produits_exploitation + $request->autres_commission_recu + $request->penalite_pret + $request->frais_dossier_credits  + $request->commissions_tontine + $request->frais_tenu_compte);
        $fraisClient->save();

        /* $fraisClient->update($request->all()); */

        return redirect()->route('fraisClient.index')->with('success', 'Information mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FraisClient  $fraisClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(FraisClient $fraisClient)
    {
        if ($fraisClient) {
            $fraisClient->delete();
            return back()->with('success', 'Prévision supprimée avec succès');
        }
    }
}
