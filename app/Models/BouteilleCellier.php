<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BouteilleCellier extends Model
{
    use HasFactory;

    protected $fillable = [
        'bouteille_id',
        'cellier_id',
        'date_achat',
        'date_ouverture',
        'peremption',
        'quantite' 
    ]; 

    public function bouteille() 
    {
        return $this->belongsTo(Bouteille::class);
    }

    public function bouteillePersonnalisee() 
    {
        return $this->belongsTo(BouteillePersonnalisee::class);
    }

    public function cellier() 
    {
        return $this->belongsTo(Cellier::class);
    }
}
