<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

  <style>
    th {
      border: 1px solid black;
    }

    table {
      border-collapse: collapse;
    }

    .socity {
      text-align: center;
    }

    .abonne {
      text-align: center;
      font-size: medium;
    }

    .sign1 {
      text-align: left;
      font-weight: bold;
    }

    .sign2 {
      text-align: right;
      font-weight: bold;
    }

    .info,
    .ope {
      text-align: left;
      font-weight: bold;
      font-size: medium;
    }

    .sign {
      font-weight: bold;
      text-align: center;
    }

    .surligne {
      text-decoration: overline;
      text-align: center;
    }

    .surlign {
      text-align: center;
    }

    .coordonner {
      border: 1px black solid;
    }

    .cadre2 {
      border: 1px black solid;
    }

    .over {
      border: 1px black solid;
    }

    .underlin {
      text-decoration: underline;
    }

    .fine {
      text-decoration: underline;
    }

    .im {
      text-align: center;
    }

    .cadre1 {
      text-align: center;
    }

    /* .btn-box {
      width: 100%;
      margin: 30px auto;
      text-align: center;
    }

    button {
      width: 110px;
      height: 35px;
      margin: 0 10px;
      background: linear-gradient(to right, #ff105f, #ffad06);
      border-radius: 30px;
      border: 0;
      outline: none;
      color: #fff;
      cursor: pointer;
    } */

    /* .container {
      width: 1000px;
      height: 350px;
      margin: 8% auto;
      background: #fff;
      border-radius: 5px;
      position: relative;
    } */

    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    .tab button:hover {
      background-color: #ddd;
    }

    .tab button.active {
      background-color: #ccc;
    }

    .tabcontent {
      display: none;
      padding: 3px 6px;
      border: 1px solid #ccc;
      border-top: none;
      -webkit-animation: fadeEffect 1s;
      animation: fadeEffect 1s;
    }

    @-webkit-keyframes fadeEffect {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeEffect {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

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
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sideb/ar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Formulaires
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('BigController.create') }}" class="nav-link active">
                    <i class="fa fa-plus"></i>
                    <p> Ajouter un formulaire</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('BigController.index') }}" class="nav-link active">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Liste des formulaires</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/home" class="nav-link active">
                    <p>Retour</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">FORMULAIRE</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Partie1')" id="defaultOpen">INFORMATION CLIENT</button>
        <button class="tablinks" onclick="openCity(event, 'Partie2')">OPÉRATION</button>
        <button class="tablinks" onclick="openCity(event, 'Partie3')">INSTALLATION</button>
      </div>
      <form method="POST" action="{{route('BigController.update', $id)}}">
        @method('PUT')

        @csrf
        <div id="identite">
          <div id="Partie1" class="tabcontent">
            <!-- <h1 class="info"> INFORMATION CLIENT</h1> -->

            <div class="coordonner">
              <div class="card-body">
                <strong>Statut :</strong>
                <input type="radio" name="Statut" id="Statut" value="pro" checked/>
                <label for="Statut">Entreprise</label>

                <!-- <input type="radio" name="statut" id="statut" value="Organisme" />
          <label for="statut">Organisme/Institution</label>

          <input type="radio" name="statut" id="statut" value="Administration" />
          <label for="statut">Administration</label> -->

                <input type="radio" name="Statut" id="Statut" value="perso" />
                <label for="Statut">Particulier</label>

                <!-- <input type="radio" name="statut" id="statut" value="Autre" />
          <label for="statut">Autre(A préciser):</label> -->

                <!-- <div id="autre" style="display : none">
            <label for="autre">Autre:</label>
            <input type="text" name="autre" id="autre" />
          </div> -->

                <div id="Raison sociale">
                  <label for="Raison_sociale">Raison sociale: </label>
                  <input type="text" name="Raison_sociale" id="Raison_sociale" value="{{$big->Raison_sociale}}" />
                </div>

                <div style="display : none" id="Physique">

                  <label for="Nom">Nom</label>
                  <input type="text" name="Nom" id="Nom" value="{{$big->Nom}}" /></br>

                  <label for="Prenom">Prénom</label>
                  <input type="text" name="Prenom" id="Prenom" value="{{$big->Prenom}}" /><br>


                  Sexe : <br>
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
                      name="Telephone" value="{{$big -> Telephone}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="Email" class="col-sm-2 col-form-label">Email :</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="Email" name="Email" value="{{$big -> Email}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Boite" class="col-sm-2 col-form-label">Boite Postale:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Boite" name="Boite" value="{{$big -> Boite}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Adresse" class="col-sm-2 col-form-label">Adresse:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Adresse" name="Adresse" value="{{$big -> Adresse}}">
                  </div>
                </div>

                <div id="mandataire" style="display : none">
                  <div class="form-group row">
                    <label for="Nom_mandataire" class="col-sm-2 col-form-label">Nom
                      mandataire/représentant:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Nom_mandataire" name="Nom_mandataire"
                        value="{{$big -> Nom_mandataire}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Qualite_mandataire" class="col-sm-2 col-form-label">Qualité du
                      mandataire/représentant:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Qualite_mandataire" name="Qualite_mandataire"
                        value="{{$big -> Qualite_mandataire}}">
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
                    </div>

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
                <p class="ope">TYPE D'OPERATION</p>
                <input type="radio" name="Type_doperation" id="Type_doperation" value="Abonnement" />
                <label for="Type_doperation">Abonnement</label>
                <input type="radio" name="Type_doperation" id="Type_doperation" value="Reabonnement" />
                <label for="Type_doperation">Réabonnement</label><br>
                <input type="radio" name="Type_doperation" id="Type_doperation" value="Suspension" />
                <label for="Type_doperation">Suspension</label>
                <input type="radio" name="Type_doperation" id="Type_doperation" value="Resiliation" />
                <label for="Type_doperation">Résiliation</label></br>
                <p id="frase" style="display : none">Indiquer le motif : <input type="text" placeholder="............................."
                    id="Motif" name="Motif" />
                </p></br>
              </div>

              <div class="ope">DETAILS DE L'OPERATION</div>
              <div class="cadre2"> <U><strong class="fine">TYPE D'OFFRES FTTx</strong></U> <strong>Double play(Téléphone
                  +Internet)</strong>
                <input type="radio" name="Offre" id="Offre" value="ADSL" />
                <label for="Offre">ADSL</label>
                <input type="radio" name="Offre" id="Offre" value="FTTH" />
                <label for="Offre">FTTH</label></br></h1>

                <div id="Résidentiels" style="display : none">
                  Particuliers / Résidentiels
                  <input type="radio" name="Forfait" id="Forfait" value="ADSL 04 Mbps" />
                  <label for="Forfait">ADSL 04 Mbps </label>
                  <input type="radio" name="Forfait" id="Forfait" value="Home 10 Mbps" />
                  <label for="Forfait">Home 10 Mbps</label>
                  <input type="radio" name="Forfait" id="Forfait" value="Home 20 Mbps" />
                  <label for="Forfait">Home 20 Mbps </label>
                  </br>
                </div>
                <div id="PetitesetMoyenesEntreprises" style="display : none">
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
                  <input type="text" name="Quartier" placeholder="..........." id="Quartier"
                    value="{{$big -> Quartier}}" />
                </th>
              </tr>
              <tr>
                <th class="text-left" width="400px" height="5px">Carré du lot :
                  <input type="text" name="Carre_du_lot" placeholder="..........." id="Carre_du_lot"
                    value="{{$big -> Carre_du_lot}}" />
                </th>
                <th class="text-left" width="250px" height="5px">Parcelle :
                  <input type="text" placeholder="..........." id="Parcelle" name="Parcelle"
                    value="{{$big -> Parcelle}}" />
                </th>
                <th class="text-left" width="250px" height="5px">Boite postale :
                  <input type="text" placeholder="..........." id="Boite_Postale" name="Boite_Postale"
                    value="{{$big -> Boite_Postale}}" />
                </th>
              </tr>
              <tr>
                <th class="text-left" width="300px" height="5px">Coordonnées géographiques (GPS) :
                  <input type="text" id="GPS" name="GPS" value="{{$big -> GPS}}" />
                </th>
                <th class="text-left" colspan="2" width="750px" height="10px">longitude
                  <input type="text" placeholder="..........." id="Longitude" name="Longitude"
                    value="{{$big -> Longitude}}" />
                  latitude<input type="text" placeholder="..........." id="Latitude" name="Latitude"
                    value="{{$big -> Latitude}}" />
                </th>
              </tr>
              <tr>
                <th class="text-left" width="300px" height="5px">Bâtiment :<input type="text" id="Batiment"
                    name="Batiment" value="{{$big -> Batiment}}" /></th>
                <th class="text-left" width="300px" height="5px">Etage :<input type="text" id="Etage" name="Etage"
                    value="{{$big -> Etage}}" /></th>
                <th class="text-left" width="300px" height="5px">Porte :<input type="text" id="Porte" name="Porte"
                    value="{{$big -> Porte}}" /></th>
              </tr>
            </table>
            </p></br>

            <p align="right" class="sign">Fait à:<input type="text" placeholder=".................." />le
              <input type="date" name="Date" placeholder=".................." id="Date"
                value="{{$big -> created_at}}" />
            </p>

            <div class="btn-box">
              <button type="button"><a href="{{route('PdfController.edit', $id)}}">Télecharger PDF</a></button> </br>
            </div>
            <button type="update">EDITER</button>
          </div>
        </div>
      </form>
    </div>


    <script>
      document.getElementById("the_click").addEventListener("click", rad)

      function rad() {
        var elt = document.querySelector('input[name="Type_doperation"]:checked').value;
        if (elt == "Suspension" || elt == "Résiliation") {
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
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <!-- <script src="adminlte/dist/js/adminlte.min.js"></script> -->
</body>

</html>