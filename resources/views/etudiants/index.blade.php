<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css"/>
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
                            Bienvenue, <strong>{{Auth::user()->name}} {{Auth::user()->first_name}}</strong>.
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
                                <div class="text-primary font-weight-bold text-uppercase">{{Auth::user()->name}} {{Auth::user()->first_name}}</div>
                                <div class="font-weight-bold   mb-1"><span class="">N<sup>o</sup> de Carte : </span> {{Auth::user()->numero_carte}}</div>
                                <div class="text-black-50 font-weight-bold  mb-0"><span class="">Tel : </span>{{Auth::user()->phone}}</div>
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
                                <div class="text-black-50 font-weight-bold  mb-0"><span class="">Etablissement : </span>  <p class="text-primary my-1 text-uppercase"> {{Auth::user()->etablissement->libelle}} </p> </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ligne des boutons de demandes -->
            <div class="row my-4">
                <div class="col-lg-6 ">
                    <a href="/etudiants/releves/create" class="card bg-gradient-primary text-white shadow float-right text-uppercase text-decoration-none">
                        <div class="card-body">
                            Demande de relevé
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 ">
                    <button href="#" class="card bg-success text-white shadow">
                        <div class="card-body">
                            <a href="/etudiants/reclamations/create" class="text-white text-uppercase text-decoration-none">Réclamations de notes</a>
                        </div>
                    </button>
                </div>
            </div>
            <div class="row my-4">
                <!--
                <div class="col-lg-6 border-left-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-question-circle"> FAQ</i></h5>
                        <div class="card shadow">
                            <!-- Card Header - Accordion ->
                            <a href="#collapseCardExample" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold">Sujet info</h6>
                            </a>
                            <!-- Card Content - Collapse ->
                            <div class="collapse" id="collapseCardExample">
                                <div class="card-body">
                                This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-lg-6 border-left-dark" id="notification">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-envelope-open"></i> Notifications</h5>
                        @if(isset($notifications) AND ($nombre > 0))
                            @foreach($notifications as $notification)
                                <div class="card">
                                    <div class="card-body" style="font-size: 0.8em">
                                         {{$notification->contenu}}
                                         <br/><button class="btn btn-success pull-right btn-sm lu" value="{{$notification->id}}">Lu</button>
                                    </div>
                                </div><br/>
                            @endforeach
                        @else
                            <div class="card">
                                <div class="card-body">
                                    Aucune notification
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
