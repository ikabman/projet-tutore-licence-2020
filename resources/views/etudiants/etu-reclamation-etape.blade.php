@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
    @if($ues)
        <link rel="stylesheet" href="/css/shopping-cart0.css" />
        <div class="text-center">
            <h2 class="">Progression de votre reclamation de notes</h2>
        </div>
        @foreach ($ues as $ue)
            <div>
                <p><b>Code</b>: {{$ue->code}}</p>
                <p><b>Libelle</b>: {{$ue->libelle}}</p>
            </div>
            <div class="container my-5 text-center">
                <ul id="progressbar">
                    <li class="@if($ue->etape_id >= 8) active @endif" id="step1">
                        <div class="d-none d-md-block">Demande</div>
                    </li>
            	       <li class="@if($ue->etape_id >= 9) active @endif" id="step2">
                        <div class="d-none d-md-block">Payement</div>
                    </li>
            	    <li class="@if($ue->etape_id >= 10) active @endif" id="step3">
                        <div class="d-none d-md-block">Dépôt</div>
                    </li>
                    <li class="@if($ue->etape_id >= 11) active @endif" id="step4">
                        <div class="d-none d-md-block">Vérification</div>
                    </li>
                    <li class="@if($ue->etape_id >= 12) active @endif" id="step5">
                        <div class="d-none d-md-block">Fin traitement</div>
                    </li>
                </ul>
            </div>
        @endforeach
    @else
        <div class="container text-center">
            <h2 class="">Aucune réclamation de note en cours</h2>
        </div>
    @endif
@endsection
