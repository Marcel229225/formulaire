<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;
    protected $fillable = [
        'chantier',
        'numero',
        'nom_prenom',
        'age',
        'poste_de_travail',
        'Plaintes',
        'poids',
        'taille',
        'ta',
        'pt',
        'pa',
        'pouls',
        'av_od',
        'og',
        'examen_physique',
        'glucoserie',
        'albiminurie',
        'autre',
        'sang',
        'conduite_a_tenir',
        'aptitude',
        'lieu',
        'antecedent_familiux',
        'antecedent_professionnel',
        'audiometrie',
        'spirometrie',
        'electrocardiogramme',
        'ordonnance',
    ];
}
