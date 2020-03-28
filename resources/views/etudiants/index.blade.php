<link rel="stylesheet" href="bootstrap.min.css"/>
<meta charset="utf-8"/>

@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
    @guest
        {{ __('Hi')}}
    @else
        <div class="container">
            <!--Welcome message-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-secondary alert-dismissible fade show wlcmsg " role="alert ">
                        <p class="msg">
                            Bienvenue || Heureux de vous revoir, <strong>{{Auth::user()->name}}</strong>.
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ligne d'info de l'etudiant -->
            <div class="row">
                <div class="col-lg-6 py-2">
                    <div class="card border-left-primary shadow h-100 py-2 ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-3">
                                <i class="fas fa-user fa-4x text-gray-300"></i>
                            </div>
                            <div class="col">
                                <div class="text-primary font-weight-bold text-uppercase ">AMOUZOU Kokou Benjamin</div>
                                <div class="font-weight-bold   mb-1"><span class="">N<sup>o</sup> de Carte : </span> 435124</div>
                                <div class="text-black-50 font-weight-bold  mb-0"><span class="">Tel : </span>92 00 11 33</div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 py-2">
                    <div class="card border-left-success shadow h-100 py-2 ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-3">
                                <i class="fas fa-school fa-4x text-gray-300"></i><i class=""></i>
                            </div>
                            <div class="col">
                                <div class="text-black-50 font-weight-bold  mb-0"><span class="">Etablissement : </span> CIC </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ligne des boutons de demandes -->
            <div class="row my-4">
                <div class="col-lg-6 ">
                    <button class="card bg-gradient-primary text-white shadow float-right">
                        <div class="card-body">
                            Demande de relevé
                        </div>
                    </button>
                </div>
                <div class="col-lg-6 ">
                    <button class="card bg-success text-white shadow">
                        <div class="card-body">
                            Reclamations de notes
                        </div>
                    </button>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-6 border-left-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-question-circle"> FAQ</i></h5>
                        <div class="card shadow">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold">Sujet info</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="collapseCardExample">
                                <div class="card-body">
                                This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 border-left-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-envelope-open"></i> Notifications</h5>
                        <div class="card ">
                            <div class="card-header">
                                Titre notifications
                            </div>
                            <div class="card-body">
                                This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
