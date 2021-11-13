@extends('layouts.auth', ['title' => "Login"])

@section('main')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('adminlte/img/sbin_accueil.jpg') }}" alt="" width="120px;" height="60px"><br/>
                <small><a href="{{ route('dashboard') }}" style="color:black;"><b>C</b>onquete</a></small>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Connectez-vous pour démmarer votre session</p>
                {{-- dd($errors->all()) --}}
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach

                {{-- <form action="{{ route('authenticate') }}" method="post"> --}}
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Mot de Passe">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!--<p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                <a href="{{-- route('register') --}}" class="text-center">Register a new membership</a>
                </p>-->
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
