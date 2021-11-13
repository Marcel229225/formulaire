<?php

namespace App\Http\Controllers;

use App\Models\Big;
use App\Http\Controllers\Controller;
use App\Models\PersonnePhysique;
use App\Models\PersonneMorale;
use App\Models\Client;
use App\Models\Operation;
use App\Models\Adresse;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;

class BigController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:form-list', ['only' => ['index']]);
         $this->middleware('permission:form-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:form-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:form-show', ['only' => ['show', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user()->roles->pluck('name');
        $user = $user[0];

        if($user == 'agent') {
            $bigs = Big::all()->where('user_id', auth()->user()->id);
            return view('/dashboard/forms/index', compact('bigs'));
        }

        //Liste des formulaires pour le chef agence
        if($user == 'chef agence') {
            $bigs = Big::all()->where('agence_id', auth()->user()->agence_id);
            return view('/dashboard/forms/index', compact('bigs'));
        }

        if($user === "admin") {
            $bigs = Big::all();
            return view('/dashboard/forms/index', compact('bigs'));
        }
    

    public function index1(Request $request)
    {
        $user = auth()->user()->roles->pluck('name');
        $user = $user[0];

        if($user == 'agent') {
            $bigs = Big::all()->where('user_id', auth()->user()->id);
            return view('/dashboard/forms/test', compact('bigs'));
        }

        //Liste des formulaires pour le chef agence
        if($user == 'chef agence') {
            $bigs = Big::all()->where('agence_id', auth()->user()->agence_id);
            return view('/dashboard/forms/test', compact('bigs'));
        }

        if($user === "admin") {
            $bigs = Big::all();
            return view('/dashboard/forms/test', compact('bigs'));
        }
        //return view('index', compact('bigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/forms/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        if($request['agence_id'] == auth()->user()->agence_id){
            // Form validation;
            $this->validate($request, [
                // 'Nom' => 'required',
                // 'Prenom' => 'required',
                // 'Sexe' => 'required',

                'Statut' => 'required',
                'Telephone' => 'required',
                'Email' => 'required',
                'Boite' => 'required',
                'Adresse' => 'required',
                'Piece' => 'required',
                'Numero_identite' => 'required',
                'Exoneration' => 'required',

                // // opertion info
                'Type_doperation' => 'required',
                'Offre' => 'required',
                'Forfait' => 'required',

                // // // Adresse
                'Ville' => 'required',
                'Commune' => 'required',
                'Quartier' => 'required',
                'Carre_du_lot' => 'required',
                'Parcelle' => 'required',
                'Boite_Postale' => 'required',
                'GPS' => 'required',
                'Longitude' => 'required',
                'Latitude' => 'required',
                'Batiment' => 'required',
                'Etage' => 'required',
                'Porte' => 'required',
            ]);

            $boss = new Big;
            $clients = new Client;
            $clients->Statut =$request->Statut;
            $boss->Statut =$request->Statut;

            if ($clients->Statut == "perso") {
                $Personne_p = new PersonnePhysique;

                $Personne_p->Nom =$request->Nom;
                $boss->Nom = $Personne_p->Nom;

                $Personne_p->Prenom = $request->Prenom;
                $boss->Prenom = $Personne_p->Prenom;

                $Personne_p->Sexe =$request->Sexe;
                $boss->Sexe = $Personne_p->Sexe;

                $Personne_p->save();
            }

            if ($clients->Statut == "pro") {
                $Personne_m = new PersonneMorale;

                $Personne_m->Raison_Sociale =$request->Raison_sociale;
                $boss->Raison_Sociale = $Personne_m->Raison_Sociale;

                $Personne_m->Nom_mandataire =$request->Nom_mandataire;
                $boss->Nom_mandataire = $Personne_m->Nom_mandataire;

                $Personne_m->Qualite_mandataire =$request->Qualite_mandataire;
                $boss->Qualite_mandataire = $Personne_m->Qualite_mandataire;

                $Personne_m->save();
            }

            if ($clients->Statut == "perso")
                $clients->Id_statut =$Personne_p->id;
            else $clients->Id_statut =$Personne_m->id;

            $clients->Telephone =$request->Telephone;
            $boss->Telephone = $clients->Telephone;

            $clients->Email =$request->Email;
            $boss->Email = $clients->Email;

            $clients->Boite =$request->Boite;
            $boss->Boite = $clients->Boite;

            $clients->Adresse =$request->Adresse;
            $boss->Adresse = $clients->Adresse;

            $clients->Piece =$request->Piece;
            $boss->Piece = $clients->Piece;

            $clients->Numero_identite =$request->Numero_identite;
            $boss->Numero_identite = $clients->Numero_identite;

            $clients->Exoneration =$request->Exoneration;
            $boss->Exoneration = $clients->Exoneration;

            $clients->save();

            $ope = new Operation;

            $ope->Type_doperation =$request->Type_doperation;
            $boss->Type_doperation = $ope->Type_doperation;

            $ope->Motif =$request->Motif ;
            $boss->Motif = $ope->Motif;

            $ope->Offre =$request->Offre ;
            $boss->Offre = $ope->Offre;

            $ope->Forfait =$request->Forfait ;
            $boss->Forfait = $ope->Forfait;

            $ope->save();

            $dresse = new Adresse;

            $dresse->Ville = $request->Ville;
            $boss->Ville = $dresse->Ville;

            $dresse->Commune =$request->Commune;
            $boss->Commune = $dresse->Commune;

            $dresse->Quartier =$request->Quartier;
            $boss->Quartier = $dresse->Quartier;

            $dresse->Carre_du_lot =$request->Carre_du_lot;
            $boss->Carre_du_lot = $dresse->Carre_du_lot;

            $dresse->Parcelle =$request->Parcelle;
            $boss->Parcelle = $dresse->Parcelle;

            $dresse->Boite_Postale =$request->Boite_Postale;
            $boss->Boite_Postale = $dresse->Boite_Postale;

            $dresse->GPS =$request->GPS;
            $boss->GPS = $dresse->GPS;

            $dresse->Longitude =$request->Longitude;
            $boss->Longitude = $dresse->Longitude;

            $dresse->Latitude =$request->Latitude;
            $boss->Latitude = $dresse->Latitude;

            $dresse->Batiment =$request->Batiment;
            $boss->Batiment = $dresse->Batiment;

            $dresse->Etage =$request->Etage;
            $boss->Etage = $dresse->Etage;

            $dresse->Porte =$request->Porte;
            $boss->Porte = $dresse->Porte;

            $dresse->save();

            if ($clients->Statut == "perso")
                $boss->Name =$Personne_p->Nom." ".$Personne_p->Prenom;
            else $boss->Name = $Personne_m->Raison_Sociale;

            $boss->Telephone = $clients->Telephone;
            $boss->Offre = $ope->Offre;
            $boss->Forfait = $ope->Forfait;
            $boss->Adresse = $request->Adresse;
            $boss->user_id = auth()->user()->id;
            $boss->agence_id = auth()->user()->agence_id;
            //$boss->user_id = auth()->user()->agence()->id;
            $boss->save();

            return redirect(route('BigController.index'));
        }else{
            return redirect(route('BigController.index'))->with('Errors');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Big  $big
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = DB::select('SELECT * FROM bigs WHERE id = ?', [$id]);

        return view('dashboard/forms/show',
                 ['id'=>$id,
                 'big' => $u[0]]
         );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Big  $big
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//(Big $big)
    {
       $u = DB::select('SELECT * FROM bigs WHERE id = ?', [$id]);

       return view('dashboard/forms/edit',
                ['id'=>$id,
                'big' => $u[0]]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Big  $big
     * @return \Illuminate\Http\Response
     */
    public function update(Big $big, $id, Request $request)
    {

       request()->validate([
            // 'Statut' => 'required',
            //'Telephone' => 'required',
            // 'Email' => 'required',
            // 'Boite' => 'required',
            // 'Adresse' => 'required',
            // 'Piece' => 'required',
            // 'Numero_identite' => 'required',
            // 'Exoneration' => 'required',

            // // opertion info
            // 'Type_dopertion' => 'required',
            // 'Offre' => 'required',
            // 'Forfait' => 'required',

            // // // Adresse
            // 'Ville' => 'required',
            // 'Commune' => 'required',
            // 'Quartier' => 'required',
            // 'Carre_du_lot' => 'required',
            // 'Parcelle' => 'required',
            // 'Boite_Postale' => 'required',
            // 'GPS' => 'required',
            // 'Longitude' => 'required',
            // 'Latitude' => 'required',
            // 'Batiment' => 'required',
            // 'Etage' => 'required',
            //  'Porte' => 'required',
            ]);

        //$big->update([

            // 'Statut' => request('Statut'),
            //'Telephone' => request('Telephone'),
            // 'Email' => request('Email'),
            // 'Boite' => 'required',
            // 'Adresse' => 'required',
            // 'Piece' => 'required',
            // 'Numero_identite' => 'required',
            // 'Exoneration' => 'required',
            // 'Type_dopertion' => 'required',
            // 'Offre' => 'required',
            // 'Forfait' => 'required',

            // 'Ville' => 'required',
            // 'Commune' => 'required',
            // 'Quartier' => 'required',
            // 'Carre_du_lot' => 'required',
            // 'Parcelle' => 'required',
            // 'Boite_Postale' => 'required',
            // 'GPS' => 'required',
            // 'Longitude' => 'required',
            // 'Latitude' => 'required',
            // 'Batiment' => 'required',
            // 'Etage' => 'required',
            // 'Porte' => 'required',
       // ]);
       $big = Big::find($id);

       //$clients = Client::find($id);Prenom
       if ($request->Statut == "perso")
            $big->Name =$request->Nom." ".$request->Prenom;
        else if ($request->Statut == "pro")
            $big->Name = $request->Raison_Sociale;

       $big->Nom =$request->get('Nom');
       $big->Prenom =$request->get('Prenom');
       $big->Raison_sociale =$request->get('Raison_sociale');
       $big->Telephone = $request->get('Telephone');
       //$clients->Telephone = $request->get('Telephone');
        $big->Statut = $request->get('Statut');
       $big->Email = $request->get('Email');
       $big->Boite = $request->get('Boite');
       $big->Adresse = $request->get('Adresse');
       $big->Piece = $request->get('Piece');
       $big->Numero_identite = $request->get('Numero_identite');
       $big->Exoneration = $request->get('Exoneration');
       $big->Type_doperation = $request->get('Type_doperation');
       $big->Offre = $request->get('Offre');
       $big->Forfait = $request->get('Forfait');
       $big->Ville = $request->get('Ville');
       $big->Commune = $request->get('Commune');
       $big->Quartier = $request->get('Quartier');
       $big->Carre_du_lot = $request->get('Carre_du_lot');
       $big->Parcelle = $request->get('Parcelle');
       $big->Boite_Postale = $request->get('Boite_Postale');
       $big->GPS = $request->get('GPS');
       $big->Longitude = $request->get('Longitude');
       $big->Latitude = $request->get('Latitude');
       $big->Batiment = $request->get('Batiment');
       $big->Etage = $request->get('Etage');
       $big->Porte = $request->get('Porte');

       $big->save();

        return redirect(route('BigController.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Big  $big
     * @return \Illuminate\Http\Response
     */
    public function destroy(Big $big)
    {
        //
    }
}
