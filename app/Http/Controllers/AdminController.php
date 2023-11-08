<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\CustomAuthController;

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
        try {
            $request->validate([
                'nom'      => 'required|min:2|max:20|alpha',
                'email'    => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'nom.required'      => "Veuillez saisir le nom",
                'nom.min'           => "Le nom doit contenir au moins 2 caractères",
                'nom.max'           => "Le nom ne doit pas dépasser 20 caractères",
                'nom.alpha'         => "Le nom ne doit contenir que des lettres",
                'email.required'    => "Veuillez saisir l'adresse courriel",
                'password.required' => "Veuillez saisir le mot de passe",
                'password.min'      => "Le mot de passe doit contenir au moins 6 caractères"
            ]);

            $user = new User;
            $user->nom = $request->input('nom');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect(route('admin.index-users'))->withSuccess('Nouvel utilisateur enregistré');
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
        try {
            $request->validate([
                'nom'      => 'required|min:2|max:20|alpha',
                'email'    => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'nom.required'      => "Veuillez saisir le nom",
                'nom.min'           => "Le nom doit contenir au moins 2 caractères",
                'nom.max'           => "Le nom ne doit pas dépasser 20 caractères",
                'nom.alpha'         => "Le nom ne doit contenir que des lettres",
                'email.required'    => "Veuillez saisir l'adresse courriel",
                'password.required' => "Veuillez saisir le mot de passe",
                'password.min'      => "Le mot de passe doit contenir au moins 6 caractères"
            ]);
    
            $user->nom = $request->input('nom');
            $user->email = $request->input('email');
            $user->email_verified_at = $request->input('email_verified');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            
            return redirect(route('admin.show-user', $user->id))->withSuccess('Utilisateur mis à jour');
        } catch (\Exception $e) {
            return redirect(route('admin.edit-user', $user->id))->withErrors(["Erreur de mise à jour"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('admin.index-users'))->withSuccess('Utilisateur supprimé'); 
    }
}
