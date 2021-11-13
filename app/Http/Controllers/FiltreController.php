<?php

namespace App\Http\Controllers;
use App\Models\Big;

use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function personnePhysique(){
        $user = auth()->user()->roles->pluck('name');
        $user = $user[0];

        if($user == 'agent') {
            $bigs = Big::all()->where('user_id', auth()->user()->id)->where('Statut', 'perso');
            return view('/dashboard/forms/index', compact('bigs'));
        }

        //Liste des formulaires pour le chef agence
        if($user == 'chef agence') {
            $bigs = Big::all()->where('agence_id', auth()->user()->agence_id)->where('Statut', 'perso');
            return view('/dashboard/forms/index', compact('bigs'));
        }

        if($user === "admin") {
            $bigs = Big::all()->where('Statut', 'perso');
            return view('/dashboard/forms/index', compact('bigs'));
        }
    }

    public function personneMorale(){
        $user = auth()->user()->roles->pluck('name');
        $user = $user[0];

        if($user == 'agent') {
            $bigs = Big::all()->where('user_id', auth()->user()->id)->where('Statut', 'perso');
            return view('/dashboard/forms/index', compact('bigs'));
        }

        //Liste des formulaires pour le chef agence
        if($user == 'chef agence') {
            $bigs = Big::all()->where('agence_id', auth()->user()->agence_id)->where('Statut', 'pro');
            return view('/dashboard/forms/index', compact('bigs'));
        }

        if($user === "admin") {
            $bigs = Big::all()->where('Statut', 'pro');
            return view('/dashboard/forms/index', compact('bigs'));
        }
    }
}
