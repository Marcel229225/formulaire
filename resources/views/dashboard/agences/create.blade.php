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
            <div class="card-header">Creer une  agence
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
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                {!! Form::close() !!}
            </div>
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
