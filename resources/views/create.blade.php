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
        <a href="index3.html" class="nav-link">Accueil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" onclick="document.getElementById('logout-form').submit()"
          title="Se deconneter">
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
    <a href="index3.html" class="brand-link">
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

          <div class="card-body p-0">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Partie1')" id="defaultOpen">INFORMATION
                CLIENT</button>
              <button class="tablinks" onclick="openCity(event, 'Partie2')">OPÉRATION</button>
              <button class="tablinks" onclick="openCity(event, 'Partie3')">INSTALLATION</button>
            </div>
            <form method="POST" action="{{route('BigController.store')}}"  id="formulaire"
                                    onsubmit="return false">

              @csrf
              <div id="identite">
                <div id="Partie1" class="tabcontent">
                  <!-- <h1 class="info"> INFORMATION CLIENT</h1> -->

                  <div class="coordonner">
                    <div class="card-body">

                      <div class="row">
                        <div class="col-sm-4">

                          <strong>Statut :</strong>
                        </div>
                        <div class="col-sm-4">
                          <input type="radio" name="Statut" id="Statut" value="pro" checked />
                          <label for="Statut">Entreprise</label>

                        </div>
                        <div class="col-sm-4">
                          <input type="radio" name="Statut" id="Statut" value="perso" />
                          <label for="Statut">Particulier</label>

                        </div>

                      </div>

                      <!-- <div class="form-group row">
                    <label for="Statut" class="col-sm-2 col-form-label">Entreprise</label>
                    <div class="col-sm-10">
                      <input type="radio" class="form-control" id="Statut" placeholder="..............."
                        name="Statut" value="pro" checked>
                    </div>

                    <label for="Statut" class="col-sm-2 col-form-label">Particulier</label>
                    <div class="col-sm-10">
                      <input type="radio" class="form-control" id="Statut" placeholder="..............."
                        name="Statut" value="perso" >
                    </div>
                </div> -->


                      <div id="Raison sociale">

                        <div class="form-group row">
                          <label for="Raison_sociale" class="col-sm-2 col-form-label">Raison sociale: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Raison_sociale" placeholder="..............."
                              name="Raison_sociale">
                          </div>
                        </div>

                      </div>

                      <div style="display: none" id="Physique">

                        <div class="form-group row">
                          <label for="Nom" class="col-sm-2 col-form-label">Nom :</label>
                          <div class="col-sm-10">
                            <input type="tel" class="form-control" id="Nom" placeholder="..............." name="Nom">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="Prenom" class="col-sm-2 col-form-label">Prénom :</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Prenom" placeholder="..............."
                              name="Prenom">
                          </div>
                        </div>


                        <strong>Sexe : </strong> <br>
                        <input type="radio" name="Sexe" value="Masculin" id="Sexe" />
                        <label for="Sexe">Masculin</label> <br>
                        <input type="radio" name="Sexe" value="Feminin" id="Sexe" />
                        <label for="Sexe">Feminin</label>
                        </br>
                      </div><br>


                      <div class="form-group row">
                        <label for="Telephone" class="col-sm-2 col-form-label">Téléphone :</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id="Telephone" placeholder="+XXX XX XX XX XX"
                            name="Telephone">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email :</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="Email" name="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Boite" class="col-sm-2 col-form-label">Boite Postale:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Boite" name="Boite">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Adresse" class="col-sm-2 col-form-label">Adresse:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Adresse" name="Adresse">
                        </div>
                      </div>

                      <div id="mandataire" block>
                        <div class="form-group row">
                          <label for="Nom_mandataire" class="col-sm-2 col-form-label">Nom mandataire:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nom_mandataire" name="Nom_mandataire">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="Qualite_mandataire" class="col-sm-2 col-form-label">Qualité
                            mandataire:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Qualite_mandataire" name="Qualite_mandataire">
                          </div>
                        </div>
                      </div><br>


                      <strong> Piece d'identité :</strong>
                      <select name="Piece" id="Piece" class="custom-select">
                        <option value="Carte_identite" selected>Carte d'identité</option>
                        <option value="Passeport">Passeport</option>
                        <option value="Permis_de_conduire">Permis de conduire</option>
                        <option value="Carte_lEPI">Carte lEPI</option>
                      </select>

                      <div class="card-body">
                        <div class="form-group row">
                          <label for="Numero_identite" class="col-sm-2 col-form-label">N° :</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Numero_identite" name="Numero_identite">
                          </div><br><br><br>

                          <label for="Date" class="col-sm-2 col-form-label">Expire le:</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="Date" name="Date">
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="ope">RENSEIGNEMENTS COMPLEMENTAIRES</p>
                        <p class="text-10xl">Bénéficiez-vous d'une exonération fiscale ?
                          <input type="radio" name="Exoneration" id="Exoneration" value="Oui" />
                          <label for="Exoneration">Oui </label>
                          <input type="radio" name="Exoneration" id="Exoneration" value="Non" />
                          <label for="Exoneration">Non (Si oui, fournir le document justificatif)</label>
                        </p></br>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="Partie2" class="tabcontent">
                  <div class="card-body">
                    <div id="the_click">
                      <p class="ope"><strong> TYPE D'OPERATION </strong></p>
                      <div class="row">
                        <div class="col-sm-3">
                          <input type="radio" name="Type_doperation" id="Type_doperation" value="Abonnement" />
                          <label for="Type_doperation">Abonnement</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="radio" name="Type_doperation" id="Type_doperation" value="Reabonnement" />
                          <label for="Type_doperation">Réabonnement</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="radio" name="Type_doperation" id="Type_doperation" value="Suspension" />
                          <label for="Type_doperation">Suspension</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="radio" name="Type_doperation" id="Type_doperation" value="Resiliation" />
                          <label for="Type_doperation">Résiliation</label>
                        </div>
                      </div>



                      <p id="frase" style="display: none">Indiquer le motif : <input type="text"
                          placeholder="............................." id="Motif" name="Motif" />
                      </p></br>
                    </div>

                    <div class="ope">DETAILS DE L'OPERATION</div>
                    <div class="cadre2"> <U><strong class="fine">TYPE D'OFFRES FTTx</strong></U> <strong>Double
                        play(Téléphone
                        +Internet)</strong>
                      <input type="radio" name="Offre" id="Offre" value="ADSL" />
                      <label for="Offre">ADSL</label>
                      <input type="radio" name="Offre" id="Offre" value="FTTH" />
                      <label for="Offre">FTTH</label></br></h1>

                      <div id="Résidentiels" style="display: none">
                        Particuliers / Résidentiels
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="radio" name="Forfait" id="Forfait" value="ADSL 04 Mbps" />
                            <label for="Forfait">ADSL 04 Mbps </label>
                          </div>

                          <div class="col-sm-3">
                            <input type="radio" name="Forfait" id="Forfait" value="Home 10 Mbps" />
                            <label for="Forfait">Home 10 Mbps</label>
                          </div>
                          <div class="col-sm-3">
                            <input type="radio" name="Forfait" id="Forfait" value="Home 20 Mbps" />
                            <label for="Forfait">Home 20 Mbps </label>
                          </div>
                        </div>
                        <!-- </br> -->
                      </div>
                      <div id="PetitesetMoyenesEntreprises" style="display: none">
                        Petites et Moyenes Entreprises (PME)

                        <input type="radio" name="Forfait" id="Forfait" value="ADSL 10 Mbps" />
                        <label for="Forfait">ADSL 10 Mbps </label>
                        <input type="radio" name="Forfait" id="Forfait" value="Pro 20 Mbps" />
                        <label for="Forfait">Pro 20 Mbps</label>
                        <input type="radio" name="Forfait" id="Forfait" value="Pro 30 Mbps" />
                        <label for="Forfait">Pro 30 Mbps </label>
                        <input type="radio" name="Forfait" id="Forfait" value="Pro 50 Mbps" />
                        <label for="Forfait">Pro 50 Mbps</label>
                        </br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="Partie3" class="tabcontent">
                <div class="card-body">
                  <p class="ope">ADRESSE DE L'INSTALLATION</p>
                  <p class="tableau">
                  <table>
                    <tr>
                      <th width="250px" height="5px">Ville</th>
                      <th width="250px" height="5px">Commune</th>
                      <th width="250px" height="5px">Quartier</th>
                    </tr>
                    <tr>
                      <th width="250px" height="25px">
                        <select name="Ville" id="Ville">
                          <option value="Cotonou">Cotonou</option>
                          <option value="Calavi">Calavi</option>
                          <option value="Porto-Novo">Porto-Novo</option>
                          <option value="Sèmè-Kpodji">Sèmè-Kpodji</option>
                          <option value="Grand-Popo">Grand-Popo</option>
                          <option value="Lokossa">Lokossa</option>
                          <option value="Abomey">Abomey</option>
                          <option value="Bohicon">Bohicon</option>
                        </select>
                      </th>
                      <th width="250px" height="25px">
                        <select name="Commune" id="Commune">
                          <option value="Cotonou">Cotonou</option>
                          <option value="Abomey-Calavi">Abomey-Calavi</option>
                          <option value="Ouidah">Ouidah</option>
                        </select>
                      </th>
                      <th width="250px" height="25px">
                        <input type="text" name="Quartier" placeholder="..........." id="Quartier" />
                      </th>
                    </tr>
                    <tr>
                      <th class="text-left" width="400px" height="5px">Carré du lot :
                        <input type="text" name="Carre_du_lot" placeholder="..........." id="Carre_du_lot" />
                      </th>
                      <th class="text-left" width="250px" height="5px">Parcelle :
                        <input type="text" placeholder="..........." id="Parcelle" name="Parcelle" />
                      </th>
                      <th class="text-left" width="250px" height="5px">Boite postale :
                        <input type="text" placeholder="..........." id="Boite_Postale" name="Boite_Postale" />
                      </th>
                    </tr>
                    <tr>
                      <th class="text-left" width="300px" height="5px">Coordonnées géographiques (GPS) :
                        <input type="text" id="GPS" name="GPS" />
                      </th>
                      <th class="text-left" colspan="2" width="750px" height="10px">longitude
                        <input type="text" placeholder="..........." id="Longitude" name="Longitude" />
                        latitude<input type="text" placeholder="..........." id="Latitude" name="Latitude" />
                      </th>
                    </tr>
                    <tr>
                      <th class="text-left" width="300px" height="5px">Bâtiment :<input type="text" id="Batiment"
                          name="Batiment" /></th>
                      <th class="text-left" width="300px" height="5px">Etage :<input type="text" id="Etage"
                          name="Etage" />
                      </th>
                      <th class="text-left" width="300px" height="5px">Porte :<input type="text" id="Porte"
                          name="Porte" />
                      </th>
                    </tr>
                  </table>
                  </p></br>

                  <p align="right" class="sign">Fait à:<input type="text" placeholder=".................." />le
                    <input type="date" name="Date" placeholder=".................." id="Date" />
                  </p>


                  <button type="submit">Envoyer</button>
                </div>
              </div>
            </form>
          </div>


          <script>
            document.getElementById("the_click").addEventListener("click", rad)

            function rad() {
              var elt = document.querySelector('input[name="Type_doperation"]:checked').value;
              if (elt == "Suspension" || elt == "Resiliation") {
                document.getElementById("frase").style.display = 'block';
              }
              else
                document.getElementById("frase").style.display = 'none';
            }
          </script>
          <script>
            document.getElementById("identite").addEventListener("click", rad2)

            function rad2() {
              var elt = document.querySelector('input[name="Statut"]:checked').value;
              if (elt == "pro") {
                document.getElementById("Raison sociale").style.display = 'block';
              }
              else
                document.getElementById("Raison sociale").style.display = 'none';

              if (elt == "perso") {
                document.getElementById("Physique").style.display = 'block';
              }
              else
                document.getElementById("Physique").style.display = 'none';

              if (elt == "pro") {
                document.getElementById("PetitesetMoyenesEntreprises").style.display = 'block';
              }
              else
                document.getElementById("PetitesetMoyenesEntreprises").style.display = 'none';

              if (elt == "perso") {
                document.getElementById("Résidentiels").style.display = 'block';
              }
              else
                document.getElementById("Résidentiels").style.display = 'none';
              if (elt == "pro") {
                document.getElementById("mandataire").style.display = 'block';
              }
              else
                document.getElementById("mandataire").style.display = 'none';
            }
          </script>


          <script>
            document.getElementById("identite").addEventListener("click", rad2)

            function rad2() {
              var elt = document.querySelector('input[name="Statut"]:checked').value;
              if (elt == "pro") {
                document.getElementById("PetitesetMoyenesEntreprises").style.display = 'block';
              }
              else
                document.getElementById("PetitesetMoyenesEntreprises").style.display = 'none';

              if (elt == "perso") {
                document.getElementById("Résidentiels").style.display = 'block';
              }
              else
                document.getElementById("Résidentiels").style.display = 'none';
              if (elt == "pro") {
                document.getElementById("mandataire").style.display = 'block';
              }
              else
                document.getElementById("mandataire").style.display = 'none';
            }
          </script>
          <script>
            function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
          </script>



        </div>
        <!-- /.content -->
      </div>
    </section>
  </div>
</div>
@endsection