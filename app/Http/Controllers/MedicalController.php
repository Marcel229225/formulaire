<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medical;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MedicalController extends Controller
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
            $medicals= Medical::all()->where('user_id', auth()->user()->id);
            return view('/dashboard/forms/index', compact('medicals'));
        }

        //Liste des formulaires pour le chef agence
        if($user == 'chef agence') {
            $medicals= Medical::all()->where('agence_id', auth()->user()->agence_id);
            return view('/dashboard/forms/index', compact('medicals'));
        }

        if($user === "admin") {
            $medicals= Medical::all();
            return view('/dashboard/forms/index', compact('medicals'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::pluck('name')->all();

        $Users =User::all();

        return view('dashboard/forms/create', compact('Users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'chantier' => 'required',
            'numero' => 'required',
            'nom_prenom' => 'required',
            'age' => 'required',
            'poste_de_travail' => 'required',
            'Plaintes' => 'required',
            'poids' => 'required',
            'taille' => 'required',
            'ta' => 'required',
            'pt' => 'required',
            'pa' => 'required',
            'pouls' => 'required',
            'av_od' => 'required',
            'og' => 'required',
            'examen_physique' => 'required',
            'glucoserie' => 'required',
            'albiminurie' => 'required',
            'autres' => 'required',
            'sang' => 'required',
            'conduite_a_tenir' => 'required',
            'aptitude' => 'required',
        ]);
        $input = $request->all();
        $medical = Medical::create($input);
        return redirect(route('MedicalController.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical = Medical::find($id);
        return view('dashboard/forms/edit', compact('medical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Medical $big, Request $request, $id)
    {
        $this->validate($request, [
            'chantier' => 'required',
            'numero' => 'required',
            'nom_prenom' => 'required',
            'age' => 'required',
            'poste_de_travail' => 'required',
            'Plaintes' => 'required',
            'poids' => 'required',
            'taille' => 'required',
            'ta' => 'required',
            'pt' => 'required',
            'pa' => 'required',
            'pouls' => 'required',
            'av_od' => 'required',
            'og' => 'required',
            'examen_physique' => 'required',
            'glucoserie' => 'required',
            'albiminurie' => 'required',
            'autres' => 'required',
            'sang' => 'required',
            'conduite_a_tenir' => 'required',
            'aptitude' => 'required',
        ]);
        $input = $request->all();

        $medical = Medical::find($id);
        $medical->update($input);
        return redirect()->route('MedicalController.index');
    }
}
