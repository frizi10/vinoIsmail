<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use App\Models\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $celliers = Cellier::where('user_id', Auth::id())->get();
        
        // Récupérer les filtres distincts sans valeurs nulles et en ordre alphabétique
        $couleurs = Bouteille::whereNotNull('couleur')->distinct()->orderBy('couleur', 'asc')->pluck('couleur');
        $pays = Bouteille::whereNotNull('pays')->distinct()->orderBy('pays', 'asc')->pluck('pays');
        $formats = Bouteille::whereNotNull('format')->distinct()->orderBy('format', 'asc')->pluck('format');
        $designations = Bouteille::whereNotNull('designation')->distinct()->orderBy('designation', 'asc')->pluck('designation');
        $producteurs = Bouteille::whereNotNull('producteur')->distinct()->orderBy('producteur', 'asc')->pluck('producteur');
        $agentPromotions = Bouteille::whereNotNull('agentPromotion')->distinct()->orderBy('agentPromotion', 'asc')->pluck('agentPromotion');
        $types = Bouteille::whereNotNull('type')->distinct()->orderBy('type', 'asc')->pluck('type');
        $millesimes = Bouteille::whereNotNull('millesime')->distinct()->orderBy('millesime', 'asc')->pluck('millesime');
        $cepages = Bouteille::whereNotNull('cepage')->distinct()->orderBy('cepage', 'asc')->pluck('cepage');
        $regions = Bouteille::whereNotNull('region')->distinct()->orderBy('region', 'asc')->pluck('region');
        
        // Récupérer le prix le plus élevé
        $prixMax = Bouteille::max('prix');

        // Récupérer le prix le plus bas
        $prixMin = Bouteille::min('prix');

    
        return view('bouteille.index', [
            'bouteilles'=> $bouteilles, 
            'celliers' => $celliers,
            'couleurs' => $couleurs,
            'pays' => $pays,
            'formats' => $formats,
            'designations' => $designations,
            'producteurs' => $producteurs,
            'agentPromotions' => $agentPromotions,
            'types' => $types,
            'millesimes' => $millesimes,
            'cepages' => $cepages,
            'regions' => $regions,
            'prixMax' => $prixMax,
            'prixMin' => $prixMin,
        ]);
    }    

    public function search(Request $request)
    {
        $bouteilles = Bouteille::paginate(7);
        $allHtml = view('partials.bouteilles', compact('bouteilles'))->render();

        $bouteillesQuery = Bouteille::query();

        $query = $request->input('search');
        $sortOption = $request->input('sort');

        // Recherche
        if (!empty($query)) {
            $bouteillesQuery->where('nom', 'LIKE', '%' . $query . '%');
        }

        $selectors = ['couleur', 'pays', 'format', 'designation', 'producteur', 'agentPromotion', 'type', 'millesime', 'cepage', 'region'];
        foreach ($selectors as $selector) {
            $values = $request->input($selector);
            if (!empty($values)) {
                // Commencez une nouvelle sous-requête pour ce sélecteur
                $bouteillesQuery->where(function ($query) use ($selector, $values) {
                    // Initialisez le premier orWhere avec la première valeur si c'est un tableau
                    if (is_array($values) && count($values) > 0) {
                        // Commencez par le premier élément du tableau pour éviter le problème de la première condition "OR"
                        $query->where($selector, '=', array_shift($values));
                        // Puis ajoutez les autres valeurs avec orWhere
                        foreach ($values as $value) {
                            $query->orWhere($selector, '=', $value);
                        }
                    } else {
                        // S'il n'y a qu'une seule valeur, ajoutez-la avec where
                        $query->where($selector, '=', $values);
                    }
                });
            }
        }


        // Trier
        if (!empty($sortOption)) {
            switch ($sortOption) {
                case 'price-asc':
                    $bouteillesQuery->orderBy('prix', 'asc');
                    break;
                case 'price-desc':
                    $bouteillesQuery->orderBy('prix', 'desc');
                    break;
                case 'name-asc':
                    $bouteillesQuery->orderBy('nom', 'asc');
                    break;
                case 'name-desc':
                    $bouteillesQuery->orderBy('nom', 'desc');
                    break;
            }
        }
        
        // // Paginer
        // $results = $bouteillesQuery->paginate(7);
        // $resultsHtml = view('partials.bouteilles', compact('results'))->render();
        // return response()->json(['resultsHtml' => $resultsHtml]);

        $page = $request->input('page');
        $results = $bouteillesQuery->paginate(7)->appends([
            'search' => $query,
            'sort' => $sortOption,
            'page' => $page,
        ]);
    
        $resultsHtml = view('partials.bouteilles', compact('results'))->render();
        return response()->json(['resultsHtml' => $resultsHtml]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bouteille.create');
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
}
