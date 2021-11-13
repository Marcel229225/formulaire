@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Creer un utilisateur
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Retour</a>
                </span>
            </div>
            @if ($role == 'chef agence')
            <div class="card-body">
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Nom:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Mot de passe:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Confirmer le mot de passe:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                    {{--<div class="form-group">
                        <strong>Agence:</strong>
                        {!! Form::select('agences[]', $Agences->id,[], array('agences' => 'form-control','multiple')) !!}
                    </div>--}}
                    <input type="hidden" >
                    <div class="form-group">
                        <strong> Agence:</strong>
                        <input type="text" class="form-control" disabled name="agence_id" value="{{ auth()->user()->agence->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                {!! Form::close() !!}
            </div>
            @endif

            @if ($role == 'admin')
            <div class="card-body">
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Nom:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Mot de passe:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Confirmer le mot de passe:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Rôle:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                    {{--<div class="form-group">
                        <strong>Agence:</strong>
                        {!! Form::select('agences[]', $Agences->id,[], array('agences' => 'form-control','multiple')) !!}
                    </div>--}}

                    <div class="form-group">
                        <strong> Agence:</strong>
                        <select name="agence_id" class="custom-select">
                            <option selected></option>
                            @foreach($Agences as $Agence)
                            <option value="{{$Agence->id}}">{{$Agence->name}}</option>
                            @endforeach
                        </select>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                {!! Form::close() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('footer_tags')
     <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>



<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

@endsection
