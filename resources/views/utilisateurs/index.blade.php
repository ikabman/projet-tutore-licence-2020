@extends('layouts.layout-admin')
@section('contenu-admin')
    <div class="container">
        <div>
            <h2 class="text-primary">Dashboard</h2>
        </div>
        <!-- Ligne des cards de resume -->
        <div class="row">
            <!-- resume du nombre d'etudiants -->
            <div class="col-lg-4 my-2">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-3">
                                <i class="fas fa-user-graduate fa-4x text-success"></i>
                            </div>
                            <div class="col  ">
                                <div class="text-md font-weight-bold text-success text-uppercase mb-2 ">étudiants inscrits</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 mx-2">
                                    <span class="badge badge-pill badge-success">{{$nEtudiants}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- resume du nombre de demandes de reclamations -->
            <div class="col-lg-4 my-2">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-3">
                                <i class="far fa-file fa-4x text-warning"></i>
                            </div>
                            <div class="col  ">
                                <div class="h6 font-weight-bold text-warning text-uppercase mb-2 ">demandes de réclamations</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 mx-2">
                                    <span class="badge badge-pill badge-warning">{{$nReclamations}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- resume du nombre de demandes de releves -->
            <div class="col-lg-4 my-2">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-3">
                                <i class="fas fa-file-alt fa-4x text-info"></i>
                            </div>
                            <div class="col  ">
                                <div class="text-md font-weight-bold text-info text-uppercase mb-2 ">demandes de relevés</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 mx-2">
                                    <span class="badge badge-pill badge-info">{{$nReleves}}</span>
                                    <span><sup>({{$nRel_def}} def,{{$nRel_inter}} inter)</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ligne des graphiques -->
        <div class="row my-5">
            <div class="col-lg-7">
                <div class="card shadow mb-4 pb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Relevés/étapes</h6>
                    </div>
                    <div class="card-body bg-white ">
                        <h6 class="text-dark text-md">Depôt</h6>
                        <div class="progress mb-1">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$p_depot}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6 class="text-dark text-md">Imprimé</h6>
                        <div class="progress mb-1">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$p_imprime}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6 class="text-dark text-md">Vérification</h6>
                        <div class="progress mb-1">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$p_verification}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6 class="text-dark text-md">Signature</h6>
                        <div class="progress mb-1">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{$p_signature}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6 class="text-dark text-md">Traité</h6>
                        <div class="progress mb-1">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$p_traite}}%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <!--
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="h6 m-0 font-weight-bold text-primary">Demandes</h6>
                    </div>
                    -->
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-1">
                            <img src="/img/chart.png" class="img-fluid" alt="Graphique illustration">
                        </div>
                        <div class="mt-4 text-center">
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Relevés
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i> Reclamations
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="text-primary">Demandes récentes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead >
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Etudiant</th>
                                <th scope="col">Date de dépôt</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Etape</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <th scope="row">{{ $demande->id}}</th>
                                        <td>{{ $demande->name}} {{ $demande->first_name}}</td>
                                        <td>{{ $demande->date_depot }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-info">{{ $demande->etat }}</span>
                                        </td>
                                        <td class="h5">
                                            <span class="badge badge-dark">{{ $demande->libelle_etape }}</span>
                                        </td>
                                    </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary btn-md">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
