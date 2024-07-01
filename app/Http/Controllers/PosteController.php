<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i='';
        $postes = Poste::orderBy('id','desc')->paginate(10);
       return view('admin.poste.index',compact('postes','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poste.create');
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
            'code'=>'required|unique:postes',
            'nom'=>'required|unique:postes'
        ]);
        Poste::create([
            'user_id'=> Auth::user()->id,
            'code' => $request->code,
            'nom' => $request->nom,
        ]);

        return redirect()->route('poste.index')->with('success','Poste ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(Poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poste $poste)
    {
        $this->validate($request,[
            'code'=>'required',
            'nom'=>'required'
        ]);

        $poste->update($request->all());
        return redirect()->route('poste.index')->with('success','Poste modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poste $poste)
    {
        if ($poste) {
           $poste->delete();
           return redirect()->route('poste.index')->with('success','Poste supprimé avec succès');

        }
    }
}
