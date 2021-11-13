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
            <div class="card-header">Utilisateur
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Retour</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nom:</strong>
                    {{ $user->name }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
                <div class="lead">
                    <strong>Agence:</strong>
                    {{ !empty($user->agence['name']) ? $user->agence['name'] : '' }}
                </div>
                <div class="lead">
                    <strong>Mot de passe:</strong>
                    ********
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
