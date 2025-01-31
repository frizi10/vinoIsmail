<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index-users', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'      => 'required|min:2|max:20|alpha',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],
        [
            'nom.required'      => "Veuillez saisir le nom",
            'nom.min'           => "Le nom doit contenir au moins 2 caractères",
            'nom.max'           => "Le nom ne doit pas dépasser 20 caractères",
            'nom.alpha'         => "Le nom ne doit contenir que des lettres",
            'email.required'    => "Veuillez saisir l'adresse courriel",
            'email.unique'      => "Un compte existe déjà pour ce courriel",
            'password.required' => "Veuillez saisir le mot de passe",
            'password.min'      => "Le mot de passe doit contenir au moins 6 caractères"
        ]);

        try {
            $user = new User;
            $user->nom = $request->input('nom');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            if ($request->input('role') == 'administrateur') {
                $user->assignRole('Admin');
            }

            return redirect(route('admin.index'))->withSuccess('Nouvel utilisateur enregistré');
        } catch (\Exception $e) {
            return redirect(route('admin.create-user'))->withErrors(["Erreur d'enregistrement"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.show-user', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        // $user = User::find($id);
        return view('admin.edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom'      => 'min:2|max:20|alpha',
            'email'    => 'email'
        ],
        [
            'nom.min'           => "Le nom doit contenir au moins 2 caractères",
            'nom.max'           => "Le nom ne doit pas dépasser 20 caractères",
            'nom.alpha'         => "Le nom ne doit contenir que des lettres",
            'email.email'       => "Le courriel entré est invalide"
        ]);

        try {
            $user->update([
                'nom' => $request->nom,
                'email' => $request->email
            ]);
    
            $user->syncRoles([$request->role]);

            return redirect(route('admin.show-user', $user->id))->withSuccess('Profil mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect(route('admin.edit-user', $user->id))->withErrors(['erreur' => "Une erreur s'est produite lors de la mise à jour du profil"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $request->validate([
            'password' => 'required',
        ], 
        [
            'password.required' => "Le mot de passe est requis pour supprimer un compte"
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            
            $celliers = $user->celliers;
            foreach($celliers as $cellier){
                $cellier->bouteillesCelliers()->delete(); 
            }
            $user->celliers()->delete();
        
            $listes = $user->listes;
            foreach($listes as $liste){
                $liste->bouteillesListes()->delete(); 
            }
            $user->listes()->delete();

            $user->delete();
            return redirect()->route('welcome')->withSuccess('Compte supprimé avec succès.');
        } else {
            return back()->withErrors(['erreur' => 'Le mot de passe est incorrect.']);
        }
    }
}
