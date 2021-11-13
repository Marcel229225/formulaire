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
            <div class="card-header">Create agence
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('agence.index') }}">agences</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'agence.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Nom:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Détails:</strong>
                        {!! Form::text('details', null, array('placeholder' => 'Details','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Numero Référence:</strong>
                        {!! Form::text('no_reference', null, array('placeholder' => 'Numero référence','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong> Chef agence:</strong>
                        <select name="user_id" class="custom-select">
                            @foreach($Users as $User)
                            <option value="{{$User->id}}" selected>{{$User->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
