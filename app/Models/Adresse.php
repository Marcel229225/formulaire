<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'Commune',
        'Quartier',
        'Carre_du_lot',
        'Parcelle',
        'Boite_Postale',
        'GPS',
        'Longitude',
        'Latitude',
        'Batiment',
        'Etage',
        'Porte',
        'Ville',
        'Parcelle',
    ];
}