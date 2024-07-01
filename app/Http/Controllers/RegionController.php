<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('id', 'asc')->paginate(10);

        return view('admin.regions.index', compact('regions',));
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
        $this->validate($request, [
            'nom_region' => 'required|unique:regions',
        ]);

        $regions = Region::all()->count();
        $countRegion = $regions + 1;
        Region::create([
            'user_id' => Auth::user()->id,
            'code_region' => 'R0' . $countRegion,
            'nom_region' => $request->nom_region,
        ]);
        return redirect()->route('region.index')->with('success', 'Région enrégistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->validate($request, [
            'nom_region' => 'required|unique:regions',
        ]);

        $region->update($request->all());
        return redirect()->route('region.index')->with('success', 'Région mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {

        $regions = Agence::where('region_id', $region->id)->get();
        if ($regions && $regions->count() > 0) {
            return back()->with('error', 'Cette region a déjà des agences elle peut pas être supprimée');
        } else {
            if ($region) {
                $region->delete();
                return redirect()->route('region.index')->with('success', 'Région supprimée');
            }
        }
    }
}
