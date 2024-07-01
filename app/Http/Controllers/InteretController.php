<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Interet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InteretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$agences = Agence::all();
        if ( Auth::user()->role == 1 || Auth::user()->role == 0) {

            $interets = Interet::orderBy('id', 'desc')->paginate(10);
        } else {
            $interets = Interet::where('code_agence', Auth::user()->code_agence)
                ->paginate(10);
        }
        return view('admin.interet.index', compact('interets','agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::where('nom_agence','!=','Direction')->get();

        return view('admin.interet.create', compact('agences'));
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
            'interet_recu_operation_client' => 'required|integer',
            'interet_recus_operation_tiers' => 'required|integer',
            'interet_verse_operation_client' => 'required|integer',
            'interet_verse_operation_tiers' => 'required|integer',
            'cout_risque_net' => 'required|integer',
            'code_agence' => 'required',
            'annee' => 'required'
        ]);
        $interet = Interet::where('code_agence', $request->code_agence)
            ->where('annee', $request->annee)->get();

        if ($interet && $interet->count() > 0) {
            return back()->with('error', 'Il y a une prevision qui est déjà enrégistrer pour cette agence pour l\'année ' . $request->annee);
        } else {

            Interet::create([
                'interet_recu_operation_client' => $request->interet_recu_operation_client,
                'interet_recus_operation_tiers' => $request->interet_recus_operation_tiers,
                'interet_verse_operation_client' => $request->interet_verse_operation_client,
                'interet_verse_operation_tiers' => $request->interet_verse_operation_tiers,
                'cout_risque_net' => $request->cout_risque_net,
                'marge_interet_cout_risque' => ($request->interet_recu_operation_client + $request->interet_recus_operation_tiers + $request->interet_verse_operation_client + $request->interet_verse_operation_tiers +  $request->cout_risque_net),
                'code_agence' => $request->code_agence,
                'annee' => $request->annee,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('interet.index')->with('success', 'Previson intérêt enrégistré avec succés');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function show(Interet $interet)
    {

        return view('admin.interet.show', compact('interet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function edit(Interet $interet)
    {
        $agences = Agence::all();

        return view('admin.interet.edit', compact('interet', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interet $interet)
    {
        $this->validate($request, [
            'interet_recu_operation_client' => 'required',
            'interet_recus_operation_tiers' => 'required',
            'interet_verse_operation_client' => 'required',
            'interet_verse_operation_tiers' => 'required',
            'cout_risque_net' => 'required',

        ]);

        $interet->interet_recu_operation_client = $request->interet_recu_operation_client;
        $interet->interet_recus_operation_tiers = $request->interet_recus_operation_tiers;
        $interet->interet_verse_operation_client = $request->interet_verse_operation_client;
        $interet->interet_verse_operation_tiers = $request->interet_verse_operation_tiers;
        $interet->cout_risque_net = $request->cout_risque_net;
        $interet->marge_interet_cout_risque = ($request->interet_recu_operation_client + $request->interet_recus_operation_tiers + $request->interet_verse_operation_client + $request->interet_verse_operation_tiers +  $request->cout_risque_net);
        $interet->save();


        /* $interet->update($request->all()); */

        return redirect()->route('interet.index')->with('success', "Intérêt mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interet $interet)
    {
        if ($interet) {
            $interet->delete();
            return back()->with('success', 'Prévision supprimée');
        }
    }
}
