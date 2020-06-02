    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/boostrap.min.css" type="text/css">

    <!-- Custom styles for this this page-->
    <link href="/css/releve-reclam.css" rel="stylesheet">

@extends("layouts.layout-admin")
@section('contenu-admin')
    <div class="4-body">
        <div class="container">
            <!-- Titre de la page -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <h1 class="text-primary">Page de Relevés</h1>
                    </div>
                </div>
            </div>

            <!-- Récapitulatif des demandes de relevés -->
            <!--ligne 1-->
            <div class="row">
                <!-- bloc de visualisation d'etapes -->
                <!-- etape des demandes -->
                <div class="col-lg-6 etape-1e">
                    <div class="titre-etape my-2">
                        <button type="button" class="btn btn-warning btn-sm btn-block ">
                            <i class="fas fa-file-invoice icon-etape-style"></i>
                            <span class="etape-button-style">
                                <a href="/utilisateurs/releves/depots" class="text-white">DEPOTS</a>
                            </span>
                            @if($nRel_depots > 0)
                                <span class="badge badge-light">{{$nRel_depots}}</span>
                            @endif
                        </button>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-warning">
                            @if($nRel_depots > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Type de relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rel_depots as $rel)
                                        <tr>
                                            <th scope="row">{{$rel->id}}</th>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->first_name}}</td>
                                            <td>{{$rel->annee_du_releve}}</td>
                                            <td>{{$rel->type_releve}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>

                <!-- etape de "impressions" -->
                <div class="col-lg-6 etape-1e">
                    <div class="titre-etape my-2">
                        <button type="button" class="btn btn-primary btn-sm btn-block ">
                            <i class="fas fa-print icon-etape-style"></i>
                            <span class="etape-button-style">
                                <a href="/utilisateurs/releves/impressions" class="text-white">IMPRESSIONS</a>
                            </span>
                            @if($nRel_impressions > 0)
                                <span class="badge badge-light">{{$nRel_impressions}}</span>
                            @endif
                        </button>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-primary">
                            @if($nRel_impressions > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Type de relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rel_impressions as $rel)
                                        <tr>
                                            <th scope="row">{{$rel->id}}</th>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->first_name}}</td>
                                            <td>{{$rel->annee_du_releve}}</td>
                                            <td>{{$rel->type_releve}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <!--ligne 2-->
            <div class="row">
                <!-- etape des verifications -->
                <div class="col-lg-6 etape-1e">
                    <div class="titre-etape my-2">
                        <button type="button" class="btn btn-danger btn-sm btn-block ">
                            <i class="far fa-eye icon-etape-style"></i>
                            <span class="etape-button-style">
                                <a href="/utilisateurs/releves/verifications" class="text-white">VERIFICATIONS</a>
                            </span>
                            @if($nRel_verifications > 0)
                                <span class="badge badge-light">{{$nRel_verifications}}</span>
                            @endif
                        </button>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-danger">
                            @if($nRel_verifications > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Type de relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rel_verifications as $rel)
                                        <tr>
                                            <th scope="row">{{$rel->id}}</th>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->first_name}}</td>
                                            <td>{{$rel->annee_du_releve}}</td>
                                            <td>{{$rel->type_releve}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>

                <!-- etape de signature -->
                <div class="col-lg-6 etape-1e">
                    <div class="titre-etape my-2">
                        <button type="button" class="btn btn-info btn-sm btn-block ">
                            <i class="fas fa-signature icon-etape-style"></i>
                            <span class="etape-button-style">
                                <a href="/utilisateurs/releves/signatures" class="text-white"> SIGNATURE</a>
                            </span>
                            @if($nRel_signatures > 0)
                                <span class="badge badge-light">{{$nRel_signatures}}</span>
                            @endif
                        </button>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-info">
                            @if($nRel_signatures > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Type de relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rel_signatures as $rel)
                                        <tr>
                                            <th scope="row">{{$rel->id}}</th>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->first_name}}</td>
                                            <td>{{$rel->annee_du_releve}}</td>
                                            <td>{{$rel->type_releve}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <!--ligne 3, fin traitement-->
            <div class="row">
                <!-- etape de fin traitement -->
                <div class="col-lg-12 etape-1e">
                    <div class="titre-etape my-2">
                        <button type="button" class="btn btn-success btn-sm btn-block ">
                            <i class="far fa-thumbs-up icon-etape-style"></i>
                            <span class="etape-button-style">
                                <a href="/utilisateurs/releves/traites" class="text-white"> FIN TRAITEMENT</a>
                            </span>
                            @if($nRel_traites > 0)
                                <span class="badge badge-light">{{$nRel_traites}}</span>
                            @endif
                        </button>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-success">
                            @if(count($Rel_traites) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Type de relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rel_traites as $rel)
                                        <tr>
                                            <th scope="row">{{$rel->id}}</th>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->first_name}}</td>
                                            <td>{{$rel->annee_du_releve}}</td>
                                            <td>{{$rel->type_releve}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
