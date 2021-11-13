<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Big extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Telephone',
        'Offre',
        'Forfait',
        'Adresse',
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
        'Raison sociale',
        'Nom_mandataire',
        'Qualite_mandataire',
        'Nom',
        'Prenom',
        'Sexe',
        'Statut',
        'Id_statut',
        'Telephone',
        'Email',
        'Piece',
        'Numero_identite',
        'Boite',
        'Adresse',
        'Exonération',
    ];
}