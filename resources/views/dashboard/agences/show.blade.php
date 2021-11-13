@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Agence
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('agence.index') }}">Retour</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nom:</strong>
                    {{ $agence->name }}
                </div>
                <div class="lead">
                    <strong>Details:</strong>
                    {{ $agence->details }}
                </div>
                <div class="lead">
                    <strong>No reference:</strong>
                    {{ $agence->no_reference }}
                </div>
                <div class="lead">
                    <strong>Chef agence:</strong>
                    {{ !empty($agence->user['name']) ? $agence->user['name'] : '' }}
                </div>
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
