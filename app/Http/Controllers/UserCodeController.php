<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.code.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        generateCode();

        return back()->with('success', 'Le code a été envoyé à votre adresse mail.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $find = UserCode::where('user_id', auth()->id())
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();

        if (!is_null($find)) {
            Session::put('user_2fa', auth()->id());
            connected(1);
            Log::info("Activité", ["user" => Auth::user()->prenom, 'activité' => 'connexion']);
            return  redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->with('error', 'Le code que vous avez entrer ne correspond pas .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCode  $userCode
     * @return \Illuminate\Http\Response
     */
    public function show(UserCode $userCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCode  $userCode
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCode $userCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCode  $userCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCode $userCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCode  $userCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCode $userCode)
    {
        //
    }

    public function status(Request $request, User $user){


        $request->validate( [
            'active' => 'required',
        ]);
        $user->active = $request->active;
        $user->save();
        if ($request->active == 1) {
            return redirect()->route('user.index')->with('success', 'Utilisateur Débloqué ');
        }else{
            return redirect()->route('user.index')->with('success', 'Utilisateur bloqué');

        }

    }

    public function viewunlock(){
        return view('admin.user.bloquer');
    }
}
