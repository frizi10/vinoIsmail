<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Affiche la liste des bouteilles en page.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $bouteilles = Bouteille::paginate(7);
 
         return view('bouteille.index', ['bouteilles'=> $bouteilles]);
     }


     public function search(Request $request) { 
         $searchTerm = $request->input('search');
         $bouteilles = Bouteille::where('nom', 'like', "%$searchTerm%")->paginate(3);
         
       return view('bouteille.show-search', ['bouteilles' => $bouteilles]);
     }

     public function sorting (Request $request) { 
         $sort = $request->input('sort');
         switch ($sort) {
             case 'price-asc':
                 $bouteilles = Bouteille::orderBy('prix', 'asc')->paginate(3);
                 break;
             case 'price-desc':
                 $bouteilles = Bouteille::orderBy('prix', 'desc')->paginate(3);
                 break;
             case 'name-asc':
                 $bouteilles = Bouteille::orderBy('nom', 'asc')->paginate(3);
                 break;
             case 'name-desc':
                 $bouteilles = Bouteille::orderBy('nom', 'desc')->paginate(3);
                 break;
             default:
                 $bouteilles = Bouteille::all();
                 break;
         }
         return view('bouteille.show-sorting', compact('bouteilles'));
  
     }

     public function filtrerProduits(Request $request)
     {
         // Récupérez les valeurs des filtres 
         $filtres = $request->only(['couleur', 'format', 'pays', 'millesime', 'region', 'prix_min', 'prix_max']);
         // Initialisez la variable $fbouteilles en tant que requête de modèle
         $fbouteilles = Bouteille::query();
         foreach ($filtres as $champ => $valeur) {
             if ($valeur !== null) 
                 if ($champ === 'prix_min') {
                     $fbouteilles->where('prix', '>=', $valeur);
                 } elseif ($champ === 'prix_max') {
                     $fbouteilles->where('prix', '<=', $valeur);
                 } else {
              
                     $fbouteilles->where($champ, $valeur);
                 }
             }
         
         // Paginer les résultats
         $fbouteilles = $fbouteilles->paginate(5);
         // Retournez la vue avec les résultats filtrés
         return view('bouteille.show-filter-results', ['fbouteilles' => $fbouteilles]);
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
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bouteille = Bouteille::findOrFail($id);
        return view('bouteille.show', ['bouteille'=> $bouteille]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function edit(Bouteille $bouteille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bouteille $bouteille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bouteille $bouteille)
    {
        //
    }
    // public function index(Request $request)
    // {
    //     $bouteillesQuery = Bouteille::query();
    //     $nom = ($request->input('search'));
    //     $prix_min = ($request->input('prix_min'));
    //     $prix_max = ($request->input('prix_max'));
       

    //     if(!empty($nom)) {
    //         $bouteillesQuery->where('nom', 'like',"%{$nom}%");
    //     }

    //     // if(!empty($prix_min)) {
    //     //     $bouteillesQuery->where('prix', '>=',"%{$prix_min}%");
    //     // }

    //     // if(!empty($prix_max)) {
    //     //     $bouteillesQuery->where('prix', '<>=',"%{$prix_max}%");
    //     // }
        
        
    //     //dd($nom);
        
    //     $bouteilles = $bouteillesQuery->paginate(10);
        
    //     return view('bouteille.index', ['bouteilles'=> $bouteilles]);

        
    // }
}
