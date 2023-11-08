<?php

namespace App\Http\Controllers;

use App\Models\BouteilleCellier;
use Illuminate\Http\Request;

class BouteilleCellierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BouteilleCellier  $bouteilleCellier
     * @return \Illuminate\Http\Response
     */
    public function show(BouteilleCellier $bouteilleCellier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BouteilleCellier  $bouteilleCellier
     * @return \Illuminate\Http\Response
     */
    public function edit(BouteilleCellier $bouteilleCellier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BouteilleCellier  $bouteilleCellier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            ['quantite' => 'required|min: 0|integer'],
            [
                'nom.required' => 'La quantité est obligatoire.', 
                'nom.min' => 'La quantité doit être supérieure ou égale à zéro.',
                'nom.integer' => 'La quantité doit être entière, sans décimal.'
            ]
        ); 

        BouteilleCellier::findOrFail($id)->update([
            'quantite' => $request->quantite
        ]);

        return response()->json(['message' => 'Mise à jour réussie'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BouteilleCellier  $bouteilleCellier
     * @return \Illuminate\Http\Response
     */
    public function destroy($cellier_id, BouteilleCellier $bouteille_cellier)
    {
        BouteilleCellier::select()->where('id', $bouteille_cellier->id)->delete(); 
        return redirect(route('cellier.show', $cellier_id));
    }
}
