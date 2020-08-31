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
                        <h1 class="text-primary">Page des Réclamations</h1>
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
                        <a type="button" class="btn btn-warning btn-sm btn-block" title="Voir tout" href="/utilisateurs/reclamations/depots">
                            <i class="fas fa-file-invoice icon-etape-style"></i>
                            <span class="etape-button-style text-white">
                                DEPOTS
                            </span>
                        </a>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-warning">
                            @if(count($Rec_depots) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Code Ue</th>
                                        <th scope="col">Type d'évaluation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rec_depots as $rec)
                                        <tr>
                                            <th scope="row">{{$rec->id}}</th>
                                            <td>{{$rec->name}}</td>
                                            <td>{{$rec->first_name}}</td>
                                            <td>{{$rec->code}}</td>
                                            <td>{{$rec->type_note}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                @include('includes.empty')
                            @endif
                        </table>
                    </div>
                </div>

                <!-- etape des verifications -->
                <div class="col-lg-6 etape-1e">
                    <div class="titre-etape my-2">
                        <a type="button" class="btn btn-danger btn-sm btn-block " href="/utilisateurs/reclamations/verifications">
                            <i class="far fa-eye icon-etape-style"></i>
                            <span class="etape-button-style text-white">
                                 VERIFICATIONS
                            </span>
                        </a>
                    </div>
                    <div class="4-etape">
                        <table class="table table-striped table-sm border-left-danger">
                            @if(count($Rec_verifications) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Code Ue</th>
                                        <th scope="col">Type d'évaluation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rec_verifications as $rec)
                                        <tr>
                                            <th scope="row">{{$rec->id}}</th>
                                            <td>{{$rec->name}}</td>
                                            <td>{{$rec->first_name}}</td>
                                            <td>{{$rec->code}}</td>
                                            <td>{{$rec->type_note}}</td>
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
            <!--ligne 2, fin traitement -->
            <div class="row">
                <!-- etape de fin traitement -->
                <div class="col-lg-12 etape-1e">
                    <div class="titre-etape my-2">
                        <a type="button" class="btn btn-success btn-sm btn-block" href="/utilisateurs/reclamations/traites">
                            <i class="far fa-thumbs-up icon-etape-style"></i>
                            <span class="etape-button-style text-white">
                                FIN TRAITEMENT
                            </span>
                        </a>
                    </div>
                    <div class="4-etape">
                        <table class="table table-sm table-striped table-sm border-left-success">
                            @if(count($Rec_traites) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Code Ue</th>
                                        <th scope="col">Type d'évaluation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Rec_traites as $rec)
                                        <tr>
                                            <th scope="row">{{$rec->id}}</th>
                                            <td>{{$rec->name}}</td>
                                            <td>{{$rec->first_name}}</td>
                                            <td>{{$rec->code}}</td>
                                            <td>{{$rec->type_note}}</td>
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
