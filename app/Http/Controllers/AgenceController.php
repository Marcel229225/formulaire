<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:agence-list', ['only' => ['index','store']]);
         $this->middleware('permission:agence-create', ['only' => ['create','store']]);
         $this->middleware('permission:agence-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agence-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $data = Agence::orderBy('id', 'desc')->paginate(5);
        //dd($data);
        return view('dashboard/agences.index', compact('data'));
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

        return view('dashboard/agences.create',  compact('Users'));
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
            'no_reference' => 'required',
            'name'  => 'required',
            'details'  => 'required',
        ]);

        $input = $request->all();
        $agence = Agence::create($input);

        //$agence = DB::insert('insert into agences ("name", "details", "no_reference", "user_id") values (?,?,?,?)', [ $input['name'], $input['details'], $input['no_reference'], $input['user_id'] ]); dd($agence);

        //$u = DB::select('SELECT * FROM bigs WHERE id = ?', [$id]);


        return redirect()->route('agence.index')
            ->with('success', 'Agence created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agence = Agence::find($id);

        return view('dashboard/agences.show', compact('agence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $agence = Agence::find($id);
        $Users = User::all()->where('agence_id', $id);

        return view('dashboard/agences.edit', compact('agence', 'Users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_reference' => 'required',
            'name'  => 'required',
            'details'  => 'required',
            'user_id'  => 'required',
        ]);

        $input = $request->all();

        $agence = Agence::find($id);
        $agence->update($input);

        //$users = User::all()->where('agence_id', $id); dd($users);

        return redirect()->route('agence.index')
            ->with('success', 'Agence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        Agence::find($id)->delete();

        return redirect()->route('agence.index')
            ->with('success', 'Agence deleted successfully.');
    }
}
