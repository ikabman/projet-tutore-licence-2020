    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/boostrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this this page-->
    <link href="/css/releve-reclam.css" rel="stylesheet">

<div class="container">
    <!--Diapo resume content-->
    <div class="navbar navbar-expand-lg navbar-white diapo-nav-style bg-white mb-5 bg-white rounded">
        <div class="row diapo-style">
            <div class="col order-first activ-etap1 diapo-cont @if(isset($etape)) @if($etape == "depots") activ-box @endif @endif">
                <a href="/utilisateurs/releves/depots" title="Dépôt de relevés">
                    <img src="/img/etape1.png"/>
                </a>
            </div>
            <div class="col diapo-cont @if(isset($etape)) @if($etape == "imprimes") activ-box @endif @endif">
                <a href="/utilisateurs/releves/impressions" title="Impression de relevés">
                    <img src="/img/etape2.png"/>
                </a>
            </div>
            <div class="col diapo-cont @if(isset($etape)) @if($etape == "verifications") activ-box @endif @endif">
                <a href="/utilisateurs/releves/verifications" title="Vérification de relevés">
                    <img src="/img/etape3.png"/>
                </a>
            </div>
            <div class="col diapo-cont @if(isset($etape)) @if($etape == "signatures") activ-box @endif @endif">
                <a href="/utilisateurs/releves/signatures" title="Signature de relevés">
                    <img src="/img/etape4.png"/>
                </a>
            </div>
            <div class="col order-last diapo-cont @if(isset($etape)) @if($etape == "traites") activ-box @endif @endif">
                <a href="/utilisateurs/releves/traites" title="Traitements effectués">
                    <img src="/img/etape5.png"/>
                </a>
            </div>
        </div>
    </div>
</div>
