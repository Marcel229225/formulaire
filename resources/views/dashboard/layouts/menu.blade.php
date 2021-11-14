<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('adminlte/img/user_profile.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" style="color:white;" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sideb/ar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard.home') }}" class="nav-link">
            <i class="nav-icon fa fa-home active"></i>
            <p>Accueil</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Formulaires
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('MedicalController.create') }}" class="nav-link active">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('MedicalController.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
        </li>

        {{-- @can('user-list')
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Utilisateurs</p>
          </a>
        </li>
        @endcan

        @can('role-list')
        <li class="nav-item">
          <a href="{{ route('roles.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Rôles</p>
          </a>
        </li>
        @endcan

        @can('agence-list')
        <li class="nav-item">
          <a href="{{ route('agence.index') }}" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
            <p>Agences</p>
          </a>
        </li>
        @endcan --}}

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
