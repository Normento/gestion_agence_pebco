<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = Agence::orderBy('id','asc')->paginate();
        $regions = Region::all();
        return view('admin.agence.index',compact('agences','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code_agence' => 'required|unique:agences',
            'nom_agence' => 'required|unique:agences'
        ]);

        Agence::create([
            'user_id' => Auth::user()->id,
            'region_id'=> $request->region_id,
            'code_agence'=> $request->code_agence,
            'nom_agence'=> $request->nom_agence,
        ]);
        return back()->with('success','Agence enrégistrée avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence)
    {
        $this->validate($request,[
            'code_agence' => 'required',
            'nom_agence' => 'required',
            'region_id' => 'required'
        ]);
        $agence->update($request->all());
        return back()->with('success','Agence mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        if ($agence) {
           $agence->delete();
           return back()->with('success','Agence suprimée avec succès');
        }
    }
}
