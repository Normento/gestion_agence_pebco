<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\Agence;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $i = '';
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.user.index', compact('users', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::all();
        $agences = Agence::all();
        return view('admin.user.create', compact('postes', 'agences'));
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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'code_agence' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->code_agence = $request->code_agence;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        $users = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password,
        ];
        Mail::to($request->email)->send(new UserMail($users));
        $user->save();
        return redirect()->route('user.index')->with('success', 'Utitlisateur enrégistré qvec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $postes = Poste::all();
        $agences = Agence::all();
        return view('admin.user.edit', compact('user', 'postes', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'code_agence' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Information mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return back()->with('success', 'Utilisateur supprimé avec succès');
        }
    }

    public function editPassword()
    {
        return view('admin.user.password.edit');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/', 'string', Rules\Password::defaults()],
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('editPassword')->with('error', "Entrer un mot de différent de l'ancient");
        } else {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('dashboard');
        }
    }

}
