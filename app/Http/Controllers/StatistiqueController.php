<?php
namespace App\Http\Controllers;

use App\Models\Cellier;
use App\Models\User;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec le nombre de celliers et de listes
        $query = User::withCount(['celliers', 'listes']);
        $usersWithCellierAndListeCount = $query->get();
    
        // Préparez les données pour la variable JavaScript
        $userData = $usersWithCellierAndListeCount->map(function ($user) {
            return [
                'id_key' => $user->id,
                'email_key' => $user->email,
                'celliers_count_key' => $user->celliers_count,
                'listes_count_key' => $user->listes_count ?? 0,
            ];
        });
    
        return view('statistics.index', [
            'userData' => $userData,
        ]);
    }
    

    public function detail($userId)
{
    // Récupérer l'utilisateur avec son nom
    $user = User::find($userId);

    // Vérifier si l'utilisateur existe
    if (!$user) {
        abort(404); // Ou gérer autrement la non-existence de l'utilisateur
    }

    // Récupérer les celliers de l'utilisateur avec la quantité de bouteilles pour chaque cellier
    $celliers = Cellier::where('user_id', $userId)->get();

    // Récupérer les listes de l'utilisateur avec la quantité de bouteilles pour chaque liste
    $listes = Liste::where('user_id', $userId)->get();

    return view('statistics.details', [
        'user' => $user,
        'celliers' => $celliers,
        'listes' => $listes,
    ]);
}

    
    

  
}
