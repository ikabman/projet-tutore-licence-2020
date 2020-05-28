    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/boostrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this this page-->
    <link href="/css/releve-reclam.css" rel="stylesheet">

<div class="container">
    <!--Diapo resume content-->
    <div class="navbar navbar-expand-lg navbar-white diapo-nav-style2 bg-white mb-5 bg-white rounded ">
        <div class="row diapo-style2">
            <div class="col order-first diapo-cont @if(isset($etape)) @if($etape == "depots") activ-box @endif @endif">
                <a href="/utilisateurs/reclamations/depots" title="Dépot de réclamations">
                    <img src="/img/etape1.png"/>
                </a>
            </div>
            <div class="col diapo-cont @if(isset($etape)) @if($etape == "verifications") activ-box @endif @endif">
                <a href="/utilisateurs/reclamations/verifications" title="Vérification de réclamations">
                    <img src="/img/etape3.png"/>
                </a>
            </div>
            <div class="col order-last diapo-cont @if(isset($etape)) @if($etape == "traites") activ-box @endif @endif">
                <a href="/utilisateurs/reclamations/traites"  title="Traitements effectués">
                    <img src="/img/etape5.png"/>
                </a>
            </div>
        </div>
    </div>
</div>
