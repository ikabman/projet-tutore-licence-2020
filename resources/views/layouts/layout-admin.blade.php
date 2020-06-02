<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--
  Important pour les requêtes ajax avec Laravel
  -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Relevés & Reclamations</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon">
               <img src="/img/logo.png" alt="" style="width:60px; height: 80px; margin-top: 7px"/>
           </div>
           <div class="sidebar-brand-text mx-3">Université de Lomé</div>
       </a>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if(isset($active)) @if($active =="dashboard") active @endif @endif">
        <a class="nav-link" href="/utilisateurs">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item @if(isset($active)) @if($active =="releves") active @endif @endif">
        <a class="nav-link" href="/utilisateurs/releves">
          <i class="fa fa-exclamation-circle"></i>
          <span>Relevés</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item @if(isset($active)) @if($active =="reclamations") active @endif @endif">
        <a class="nav-link" href="/utilisateurs/reclamations">
          <i class="fas fa-shekel-sign"></i>
          <span>Réclamations</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item @if(isset($active)) @if($active =="administrateur") active @endif @endif">
        <a class="nav-link" href="/register/utilisateur">
          <i class="fas fa-user"></i>
          <span>Administrateur</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item @if(isset($active)) @if($active =="historique") active @endif @endif">
        <a class="nav-link" href="#">
          <i class="fas fa-history"></i>
          <span>Historique</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->

            <span class="titleR">
                Releve et Reclamations<sup> Admin</sup>
            </span>
          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-900 small">{{Auth::user()->name}} {{Auth::user()->first_name}}</span>
                <img class="img-profile rounded-circle" src="/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="/edit/utilisateur">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modifier vos informations personnelles
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Deconnexion
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        @yield('contenu-admin')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('includes.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded-circle" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize">êtes</span>-vous sûre ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Choisir "se déconnecter" si vous etes près à vous déconnecter</div>
        <div class="modal-footer">
            <button class="btn btn-info btn-sm" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" data-toggle="modal" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Se déconnecter') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.js"></script>
  <script src="/js/actions_administrateurs.js"></script>
  <script src="/js/voir_plus.js"></script>
</body>

</html>
