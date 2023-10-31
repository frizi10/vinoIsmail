<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'pays',
        'region',
        'couleur',
        'format',
        'prix',
        'srcImage',
        'srcsetImage',
        'producteur',
        'millesime',
        'cepage',
        'tauxSucre',
        'designation',
        'degre',
        'agentPromotion',
        'produitQuebec',
        'type'
    ]; 

    public function bouteillesCelliers() 
    {
        return $this->hasMany(BouteilleCellier::class);
    }

    public function bouteillesPaniers() 
    {
        return $this->hasMany(BouteillePanier::class);
    }

    public function commentaires() 
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favoris() 
    {
        return $this->hasMany(Favoris::class);
    }
}
