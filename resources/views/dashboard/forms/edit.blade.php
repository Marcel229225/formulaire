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
                    <a class="nav-link" data-toggle="dropdown" href="#"
                        onclick="document.getElementById('logout-form').submit()" title="Se deconneter">
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
                <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <h1>Ajouter un formulaire</h1>
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
                            <form action="{{ route('MedicalController.store') }}" method="POST" id="formulaire"
                                onsubmit="return false">
                                @csrf
                                <input type="hidden" name="agence_id" value="{{ auth()->user()->agence_id }} " />

                                <div class="container">
                                    <img src="{{ asset('adminlte/img/medical.jpg') }}" alt="" width="10%;">
                                    <br />
                                    <div class=" lieu ">
                                        <input type="text " name="lieu " id="lieu " />
                                        <label for="Date ">Le</label>
                                        <input type="date " name="Date " id="Date " /><br><br>
                                        <div>
                                            <strong class="infirmerie ">INFIRMERIE:</strong>
                                            <strong class="chantier ">CHANTIER:</strong>
                                            <input type="text " name="chantier" id="chantier" value="{{$medical->chantier}}"/>
                                        </div>
                                    </div><br>
                                    <div class="fiche ">
                                        <label for="text "><strong>FICHE MEDICALE N°</strong></label>
                                        <input type="text " name="numero" id="numero" value="{{$medical->numero}}"/>
                                    </div><br><br>

                                    <div>
                                        <label for="text ">Nom & Prénoms:</label>
                                        <input type="text " name="nom_prenom" id="nom_prenom" value="{{$medical->nom_prenom}}"/><br>

                                        <label for="age ">Age:</label>
                                        <input type="number " name="age" id="age" value="{{$medical->age}}"/>

                                        <label for="poste ">Poste de travail:</label>
                                        <input type="text " name="poste_de_travail" id="poste_de_travail" value="{{$medical->poste_de_travail}}"/>
                                    </div>
                                    <div>
                                        <div class="clinique ">
                                            <strong>Antécédents Familiaux</strong>
                                        </div>
                                        <textarea name="antécédents_familiaux" id="antécédents_familiaux" cols="50 "
                                            rows="2"></textarea>
                                        <div class="clinique ">
                                            <strong>Antécédents Professionnels</strong>
                                        </div>
                                        <textarea name="antécédents_professionnels" id="antécédents_professionnels"
                                            cols="50 " rows="2"></textarea>
                                    </div>
                                    <br>
                                    <div>
                                        <div class="clinique "><strong>I- Clinique</strong> </div><br>
                                        <div class="clinique ">
                                            <strong>Plaintes</strong>
                                        </div>
                                        <textarea name="Plaintes" id="Plaintes" cols="50 " rows="2 " value="{{$medical->Plaintes}}"></textarea>
                                        <div class="mensuration "><strong>Mensurations:</strong></div><br><br>
                                        <div class="tab ">
                                            <label for="poids ">Poids</label>
                                            <input type="number " name="poids" id="poids" placeholder="..............kg " value="{{$medical->poids}}"/>
                                            <label for="taille ">Taille:</label>
                                            <input type="number " name="taille" id="taille "
                                                placeholder="..............m " value="{{$medical->taille}}"/>
                                            <label for="TA ">TA:</label>
                                            <input type="text " name="ta" id="ta"
                                                placeholder="......../......mmHg " value="{{$medical->ta}}"/><br><br>

                                            <label for="PT ">PT</label>
                                            <input type="number " name="pt" id="pt" placeholder="..............cm " value="{{$medical->pt}}"/>
                                            <label for="PA ">PA</label>
                                            <input type="number " name="pa" id="pa" placeholder="..............cm " value="{{$medical->pa}}"/>
                                            <label for="pouls ">Pouls</label>
                                            <input type="number " name="pouls" id="pouls"
                                                placeholder="..............pls/mn " value="{{$medical->pouls}}"/><br><br>

                                            <label for="AV ">AV : OD :</label>
                                            <input type="number " name="av_od" id="av_od"
                                                placeholder="............../10 " value="{{$medical->av_od}}"/>
                                            <label for="OG ">OG :</label>
                                            <input type="number " name="og" id="og"
                                                placeholder="............../10 " value="{{$medical->og}}"/><br><br>
                                        </div>
                                        <div class="clinique "><strong>Examen Physiques</strong></div><br>
                                        <textarea name="examen_physique" id="examen_physique" cols="50 "
                                            rows="2" value="{{$medical->examen_physique}}"></textarea><br><br>

                                        <div class="clinique "><strong>II- Examens complémentaires</strong> </div><br>
                                        <div class="tab2 ">
                                            <ul>
                                                <li>Biologie
                                                    <label for="Urine ">- Urines : Glucosurie :</label>
                                                    <input type="text " name="glucoserie" id="glucoserie" value="{{$medical->glucoserie}}"/>
                                                    <label for="Albuminurie ">- Albuminurie :</label>
                                                    <input type="text " name="albiminurie" id="albiminurie" value="{{$medical->albiminurie}}"/><br>
                                                    <label for="Sang ">- Sang :</label>
                                                    <input type="text " name="sang" id="sang" value="{{$medical->sang}}"/>
                                                    <div class="clinique ">
                                                        <strong>Autres</strong>
                                                    </div>
                                                    <textarea name="autres" id="autres" cols="50 " rows="5" value="{{$medical->autres}}"></textarea>

                                                </li><br>
                                                <div class="clinique ">
                                                    <strong>Electrocardiogramme :</strong>
                                                </div>
                                                <textarea name="electrocardiogramme" id="electrocardiogramme" cols="50 " rows="2 "value="{{$medical->electrocardiogramme}}"></textarea>
                                                <div class="clinique ">
                                                    <strong>Audiométrie :</strong>
                                                </div>
                                                <textarea name="audiometrie" id="audiometrie" cols="50 " rows="2 " value="{{$medical->audiometrie}}"></textarea>
                                                <div class="clinique ">
                                                    <strong>Spirométrie :</strong>
                                                </div>
                                                <textarea name="spirometrie" id="spirometrie" cols="50 " rows="2 " value="{{$medical->spirometrie}}"></textarea>
                                            </ul>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="clinique "><strong>III- Conduite à tenir</strong><br>
                                        <textarea name="conduite_a_tenir" id="conduite_a_tenir" cols="50"
                                            rows="2" value="{{$medical->conduite_a_tenir}}"></textarea><br><br>

                                    </div><br>
                                    <div class="clinique "><strong> Ordonnance médicale :</strong></div><br>
                                    <textarea name="ordonnance" id="ordonnance" cols="50 " rows="2" value="{{$medical->ordonnance}}"></textarea><br><br>


                                    <div class="clinique "><strong>IV- Aptitude</strong><br>
                                        <textarea name="aptitude" id="aptitude" cols="50 " rows="2" value="{{$medical->aptitude}}"></textarea><br><br>
                                    </div>
                                </div>

                                <button type="submit" id="Submit" onclick="document.getElementById('formulaire').submit()"
                                    class="btn btn-primary">Enregistrer</button>
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
                document.addEventListener('DOMContentLoaded', function() {
                    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
                })

                function hide_personne_moral() {
                    var personne_physique_elmts = document.querySelectorAll('#perso');

                    personne_physique_elmts.forEach(element => {
                        element.style.display = 'block';
                    });

                    var elmts = document.querySelectorAll('#pro');
                    elmts.forEach(element => {
                        element.style.display = 'none';
                    });
                }

                function hide_personne_physique() {
                    var personne_morale_elmts = document.querySelectorAll('#pro');
                    personne_morale_elmts.forEach(element => {
                        element.style.display = 'block';
                    });

                    var elmts = document.querySelectorAll('#perso');
                    elmts.forEach(element => {
                        element.style.display = 'none';
                    });
                }
            </script>

        @endsection
