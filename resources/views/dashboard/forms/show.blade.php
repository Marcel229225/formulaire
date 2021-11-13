@extends('dashboard/layouts/app')

@section('header_tags')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
@endsection

@section('main')
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Accueil</a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" onclick="document.getElementById('logout-form').submit()" title="Se deconneter">
                <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>
                <i class="fas fa-power-off" style=""></i>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
              <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">Conquete</span>
            </a>

            <!-- Sidebar -->
            @include('dashboard/layouts/menu')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Voir un formulaire</h1>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
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
                    {{-- <div class="col-md-12">
                        <div class="card card-default">

                            <div class="card-header">
                            <h3 class="card-title">bs-stepper</h3>
                        </div> --}}

                    <div class="card-body p-0">
                        <form method="POST" action="{{ route('BigController.update', $id) }}" id="formulaire" onsubmit="return false">
                            @method('PUT')

                        @csrf
                            <div class="bs-stepper linear">
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- your steps here -->
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Information Client</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#operation-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="true">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Operation</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step active" data-target="#installation-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="true">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Installation</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="bs-stepper-content container">
                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                        <div class="form-group">
                                            <div class="row" >
                                                <div class="col-sm-4">
                                                  <strong>Statut :</strong>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="radio" name="Statut" id="Statut" value="pro" onclick="hide_personne_physique()" {{ $big->Statut == 'pro' ? 'checked' : '' }}>
                                                  <label for="Statut">Entreprise</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="radio" name="Statut" id="Statut" value="perso" onclick="hide_personne_moral();" {{ $big->Statut == 'perso' ? 'checked' : '' }}>
                                                  <label for="Statut2">Particulier</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="pro">
                                            <label for="Raison_sociale" class="col-sm-2 col-form-label">Raison sociale</label>
                                            <input type="text" class="form-control" id="Raison_sociale" value="{{$big->Raison_sociale}}" placeholder="..............." name="Raison_sociale" disabled>
                                        </div>

                                        <div class="form-group" id="perso">
                                            <label for="Nom" class="col-sm-2 col-form-label">Nom</label>
                                            <input type="text" class="form-control" id="Nom" name="Nom" value="{{$big->Nom}}" placeholder="Enter name" disabled>
                                        </div>

                                        <div class="form-group" id="perso">
                                            <label for="Prenom" class="col-sm-2 col-form-label">Prénom :</label>
                                            <input type="text" class="form-control" id="Prenom" value="{{$big->Prenom}}" name="Prenom" placeholder="..............." disabled>
                                        </div>

                                        <div class="form-group" id="perso">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                  <strong>Sexe :</strong>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="radio" name="Sexe" value="Masculin" id="Sexe" {{ $big->Sexe == 'Masculin' ? 'checked' : '' }} disabled>
                                                  <label for="Sexe">Masculin</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="radio" name="Sexe" value="Feminin" id="Sexe" {{ $big->Sexe == 'Feminin' ? 'checked' : '' }} disabled>
                                                  <label for="Sexe">Feminin</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Telephone" class="col-sm-2 col-form-label">Téléphone :</label>
                                            <input class="form-control" id="Telephone" value="{{$big->Telephone}}" placeholder="+XXX XX XX XX XX" name="Telephone" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 col-form-label">Email :</label>
                                            <input type="email" class="form-control" id="Email" value="{{$big->Email}}" name="Email" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="Boite" class="col-sm-2 col-form-label">Boite Postale:</label>
                                            <input type="text" class="form-control" id="Boite" value="{{$big->Boite}}" name="Boite" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="Adresse" class="col-sm-2 col-form-label">Adresse</label>
                                            <input type="text" class="form-control" id="Adresse" value="{{$big->Adresse}}" name="Adresse" disabled>
                                        </div>
                                    <div id="mandataire">
                                        <div class="form-group" id="pro">
                                            <label for="Nom_mandataire" class="col-sm-2 col-form-label">Nom mandataire:</label>
                                            <input type="text" class="form-control" id="Nom_mandataire" value="{{$big->Nom_mandataire}}" name="Nom_mandataire" disabled>
                                        </div>
                                    </div>

                                        <div class="form-group" id="pro">
                                            <label for="Qualite_mandataire" class="col-sm-2 col-form-label">Qualité
                                              mandataire:</label>
                                              <input type="text" class="form-control" id="Qualite_mandataire" value="{{$big->Qualite_mandataire}}" name="Qualite_mandataire" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Piece d'identité</label>
                                            <select name="Piece" id="Piece" class="custom-select" disabled>
                                                <option value="Carte_identite" selected>Carte d'identité</option>
                                                <option value="Passeport">Passeport</option>
                                                <option value="Permis_de_conduire">Permis de conduire</option>
                                                <option value="Carte_lEPI">Carte lEPI</option>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Numero_identite" class="col-sm-2 col-form-label">N° :</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" id="Numero_identite" value="{{$big->Numero_identite}}" name="Numero_identite" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Date" class="col-sm-2 col-form-label">Expire le:</label>
                                            <div class="col-sm-10">
                                              <input type="date" class="form-control" id="Date" name="Date" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="ope">RENSEIGNEMENTS COMPLEMENTAIRES</p>
                                            <p class="text-10xl">Bénéficiez-vous d'une exonération fiscale ?
                                              <input type="radio" name="Exoneration" id="Exoneration" value="Oui" {{ $big->Exoneration == 'Oui' ? 'checked' : '' }} disabled/>
                                              <label for="Exoneration">Oui </label>
                                              <input type="radio" name="Exoneration" id="Exoneration" value="Non" {{ $big->Exoneration == 'Non' ? 'checked' : '' }} disabled/>
                                              <label for="Exoneration">Non (Si oui, fournir le document justificatif)</label>
                                            </p>
                                        </div>

                                        <button class="btn btn-primary" onclick="stepper.next()" style="float:right;">Suivant</button>
                                    </div>

                                    <div id="operation-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                        <div class="form-group">
                                            <label for="Qualite_mandataire" class="col-sm-2 col-form-label">Type d'Opération</label>
                                            <div class="row container">
                                                <div class="col-sm-3">
                                                  <input type="radio" name="Type_doperation" id="Type_doperation" value="Abonnement" onclick="hideMotif();" {{ $big->Type_doperation == 'Abonnement' ? 'checked' : '' }} disabled/>
                                                  <label for="Type_doperation">Abonnement</label>
                                                </div>
                                                <div class="col-sm-3">
                                                  <input type="radio" name="Type_doperation" id="Type_doperation" value="Reabonnement" onclick="hideMotif();" {{ $big->Type_doperation == 'Reabonnement' ? 'checked' : '' }} disabled/>
                                                  <label for="Type_doperation">Réabonnement</label>
                                                </div>
                                                <div class="col-sm-3">
                                                  <input type="radio" name="Type_doperation" id="Type_doperation" value="Suspension" onclick="showMotif();" {{ $big->Type_doperation == 'Suspension' ? 'checked' : '' }} disabled/>
                                                  <label for="Type_doperation">Suspension</label>
                                                </div>
                                                <div class="col-sm-3">
                                                  <input type="radio" name="Type_doperation" id="Type_doperation" value="Resiliation" onclick="showMotif();" {{ $big->Type_doperation == 'Résilation' ? 'checked' : '' }} disabled/>
                                                  <label for="Type_doperation">Résiliation</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="motif" style="display:none;">
                                            <label for="Qualite_mandataire" class="form-label">Indiquer le motif </label>
                                            <input type="input" class="form-control" placeholder="............................." name="Motif" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="Qualite_mandataire" class="col-sm-2 col-form-label" style="text-decoration: underline">Détails de l'Opération</label> <br>
                                        </div>

                                        <label for="Nom_mandataire" class="col-sm-2 col-form-label">Type d'offres FTTX :</label>
                                        <div class="form-group" style="border: 1px solid black;">
                                            <label for="Nom_mandataire" class="col-sm-6 col-form-label">Double play(Téléphone +Internet) :</label>
                                            <div class="row container">
                                                <div class="col-sm-3">
                                                    <input type="radio" name="Offre" id="Offre1" value="ADSL" {{ $big->Offre == 'ADSL' ? 'checked' : '' }} disabled/>
                                                    <label for="Offre1">ADSL</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="radio" name="Offre" id="Offre2" value="FTTH"  {{ $big->Offre == 'FTTH' ? 'checked' : '' }} disabled/>
                                                    <label for="Offre2">FTTH</label>
                                                </div>
                                            </div>

                                            <label id="Résidentiels" class="col-sm-6 col-form-label" id="pro">Petites et Moyennes Entreprises (PME) :</label>
                                            <div class="row container" id="pro">
                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="ADSL 04 Mbps"  {{ $big->Forfait == 'ADSL 04 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">ADSL 10 Mbps </label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="Home 10 Mbps" {{ $big->Forfait == 'Home 10 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">Pro 20 Mbps</label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="Home 20 Mbps" {{ $big->Forfait == 'Home 20 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">Pro 30 Mbps </label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="Home 20 Mbps" {{ $big->Forfait == 'Home 20 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">Pro 50 Mbps </label>
                                                </div>
                                            </div>
                                        <div id="perso">
                                            <label id="Résidentiels" class="col-sm-6 col-form-label">Particuliers / Résidentiels :</label>
                                            <div class="row container" >
                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="ADSL 04 Mbps" {{ $big->Forfait == 'ADSL 04 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">ADSL 04 Mbps </label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="Home 10 Mbps" {{ $big->Forfait == 'Home 10 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">Home 10 Mbps</label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <input type="radio" name="Forfait" id="Forfait" value="Home 20 Mbps" {{ $big->Forfait == 'Home 20 Mbps' ? 'checked' : '' }} disabled/>
                                                    <label for="Forfait">Home 20 Mbps </label>
                                                </div>
                                            </div></div>
                                        </div>

                                        <button class="btn btn-primary" onclick="stepper.previous()">Precédent</button>
                                        <button class="btn btn-primary" onclick="stepper.next()" style="float:right;">Suivant</button>
                                    </div>

                                    <div id="installation-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ville</label>
                                                    <select name="Ville" id="Ville" class="form-control" disabled>
                                                        <option value="Cotonou">Cotonou</option>
                                                        <option value="Calavi">Calavi</option>
                                                        <option value="Porto-Novo">Porto-Novo</option>
                                                        <option value="Sèmè-Kpodji">Sèmè-Kpodji</option>
                                                        <option value="Grand-Popo">Grand-Popo</option>
                                                        <option value="Lokossa">Lokossa</option>
                                                        <option value="Abomey">Abomey</option>
                                                        <option value="Bohicon">Bohicon</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Commune</label>
                                                    <select name="Commune" id="Commune" class="form-control" disabled>
                                                        <option value="Cotonou">Cotonou</option>
                                                        <option value="Abomey-Calavi">Abomey-Calavi</option>
                                                        <option value="Ouidah">Ouidah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Quartier</label>
                                                    <input class="form-control" type="text" name="Quartier" placeholder="..........." id="Quartier" value="{{$big->Quartier}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Carré du lot :</label>
                                                    <input class="form-control" type="text" name="Carre_du_lot" placeholder="..........." id="Carre_du_lot" value="{{$big->Carre_du_lot}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Parcelle :</label>
                                                    <input class="form-control" type="text" placeholder="..........." id="Parcelle" name="Parcelle" value="{{$big->Parcelle}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Boite postale :</label>
                                                    <input class="form-control" type="text" placeholder="..........." id="Boite_Postale" name="Boite_Postale" value="{{$big->Boite}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Coordonnées géographiques (GPS) :</label>
                                                    <input class="form-control" type="text" id="GPS" name="GPS" value="{{$big->GPS}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Longitude</label>
                                                    <input class="form-control" type="text" placeholder="..........." id="Longitude" name="Longitude" value="{{$big->Longitude}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Latitude</label>
                                                    <input class="form-control" type="text" placeholder="..........." id="Latitude" name="Latitude"
                                                    value="{{$big -> Latitude}}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Bâtiment</label>
                                                    <input class="form-control" type="text" id="Batiment" name="Batiment" value="{{$big->Batiment}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Etage</label>
                                                    <input class="form-control" type="text" id="Etage" name="Etage" value="{{$big->Etage}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Porte</label>
                                                    <input class="form-control" type="text" id="Porte" name="Porte" value="{{$big->Porte}}" disabled/>
                                                </div>
                                            </div>
                                        </div>



                                        <button class="btn btn-primary" onclick="stepper.previous()">Precédent</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>






                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
    <!-- ./wrapper -->
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
    <script src="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script type="text/javascript">
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        function hide_personne_moral(){
            var personne_physique_elmts = document.querySelectorAll('#perso');

            personne_physique_elmts.forEach(element => {
                element.style.display = 'block';
            });

            var elmts = document.querySelectorAll('#pro');
            elmts.forEach(element => {
                element.style.display = 'none';
            });
        }

        function hide_personne_physique(){
            var personne_morale_elmts = document.querySelectorAll('#pro');
            personne_morale_elmts.forEach(element => {
                element.style.display = 'block';
            });

            var elmts = document.querySelectorAll('#perso');
            elmts.forEach(element => {
                element.style.display = 'none';
            });
        }

        function showMotif(){
            document.getElementById('motif').style="display:block";
        }
        function hideMotif(){
            document.getElementById('motif').style="display:none";
        }


    </script>

@endsection



