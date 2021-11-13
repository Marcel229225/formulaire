<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
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

        if($user == 'chef agence') {
            $data = User::all()->where('agence_id', auth()->user()->agence_id);
            return view('users.index', compact('data'));
        }
        if($user === "admin") {
            $data = User::orderBy('id')->get();
            return view('users.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $agences=Agence::pluck('name')->all();
        $Agences = Agence::all();
        $role = auth()->user()->roles->pluck('name');
        $role = $role[0];
        return view('users.create', compact('role', 'roles', 'agences', 'Agences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Chef d'agence
        $role = auth()->user()->roles->pluck('name');
        $role = $role[0];
        if($role == 'chef agence'){
            $request['agence_id'] = auth()->user()->agence_id;
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
                //'roles' => 'required', Un chef d'agence ne peu creer qu'un agent
                'agence_id',
            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole('agent');
            //$user->assignAgence($request->input('agences'));

            return redirect()->route('users.index')
                ->with('success', 'User created successfully.');
        }

        //Admin
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required',
            'agence_id',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    //dd($input);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        //$user->assignAgence($request->input('agences'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = auth()->user()->roles->pluck('name');
        $role = $role[0];

        $user = User::find($id);
        $Agences = Agence::all();
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('role', 'user', 'roles', 'userRole', 'Agences'));
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
        //Chef d'agence
        $role = auth()->user()->roles->pluck('name');
        $role = $role[0];
        if($role == 'chef agence'){
            $request['agence_id'] = auth()->user()->agence_id;
            $this->validate($request, [
                'name' => 'required',
                //'email' => 'required|email|unique:users,email',
                'email' => 'required',
                'password' => 'required|confirmed',
                //'roles' => 'required', Un chef d'agence ne peu creer qu'un agent
                'agence_id',
            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::find($id);
            $user->update($input);
            $user->assignRole('agent');
            //$user->assignAgence($request->input('agences'));

            return redirect()->route('users.index')
                ->with('success', 'Utilisateur mis a jour avec succes.');
        }

        $input = $request->all();

        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));
        //$user->assignAgence($request->input('agence_id'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
