
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



<!--Affichage des resultats de recherche d'une reclamation -->
<div class="row">
    <div class="col-lg-12">

    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold ">20 Resultats trouvées pour "Something or else";</h6>
    </div>
    <div class="card-body">
        @include('includes.rel-result-tab')
        <hr>
        @include('includes.reclam-result-tab')
    </div>
</div>
