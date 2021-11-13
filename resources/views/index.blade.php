<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <style>
        th,
        td,
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
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
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes fadeEffect {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    </style>
     <title>Document</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script src = "https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src = "https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                $('#example1').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Notifications Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Partie1')" id="defaultOpen">GÉNÉRAL</button>
      <button class="tablinks" onclick="openCity(event, 'Partie2')">PERSONNE PHYSIQUE</button>
      <button class="tablinks" onclick="openCity(event, 'Partie3')">PERSONNE MORALE</button>
    </div>


    <div id="Partie1" class="tabcontent">
      <table id="example" class="display" style="width:100%">
          <caption>Client physique</caption>
          <thead>
              <tr>
                  <th>Nom et Prénom / Raison_sociale</th>
                  <th>Téléphone</a></th>
                  <th>Offre</th>
                  <th>Forfait</th>
                  <th>Adresse(Ville)</th>
                  <th>Date</th>   <th>{{$big->Telephone}}</th>
                  <th>{{$big->Offre}}</th>
                  <th>{{$big->Forfait}}</th>
                  <th>{{$big->Adresse}}</th>
                  <th>{{$big->created_at}}</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($bigs as $big)
              <tr>
                  <th> {{$big->Name}}</th>
                  <th>{{$big->Telephone}}</th>
                  <th>{{$big->Offre}}</th>
                  <th>{{$big->Forfait}}</th>
                  <th>{{$big->Adresse}}</th>
                  <th>{{$big->created_at}}</th>
                  <th><button type="button"> <a href="{{ route('BigController.edit', $big->id) }}">Modifier</a></button></th>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>

    <div id="Partie2" class="tabcontent">
      <table id="example1" class="display1" style="width:50%">
          <thead>
              <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Sexe</th>

              </tr>
          </thead>
          <tbody>
              @foreach($bigs as $big1)
              <tr>
                  <th><a href="{{ route('BigController.edit', $big->id) }}">{{$big1->Nom}}</th>
                  <th>{{$big1->Prenom}}</th>
                  <th>{{$big1->Sexe}}</th>
              </tr>
              @endforeach
          </tbody>
      </table><br>
    </div>

    <div id="Partie3" class="tabcontent">
      <table id="example2" class="display2" style="width:50%">
          <thead>
              <tr>
                  <th>Raison_Social</th>
              </tr>
          </thead>
          <tbody>
              @foreach($bigs as $big2)
              <tr>
                <th><a href="{{ route('BigController.edit', $big->id) }}">{{$big2->Raison_sociale}}</th>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>

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
    <!-- /.content-header -->

    <!-- Main content -->

  </div>
  <!-- {{-- <form method="POST" action="create">--}} -->



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

<!-- jQuery -->
<!-- <script src="adminlte/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="adminlte/dist/js/adminlte.min.js"></script> -->
</body>
</html>
