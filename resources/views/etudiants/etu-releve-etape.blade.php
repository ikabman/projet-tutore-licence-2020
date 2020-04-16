@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
@if($releve)
<link rel="stylesheet" href="/css/shopping-cart.css" />
    <div class="container my-5 text-center">
        <h2 class="">Progression de votre demande de relevé</h2>
        <p><b>Type</b>: {{$releve->type_releve}}</p>
        <p><b>Annee</b>: {{$releve->annee_du_releve}}</p>
        <ul id="progressbar">
            <li class=" @if($releve->etape_id >= 1) active @endif " id="step1">
                <div class="d-none d-md-block">Demande</div>
            </li>
    	       <li class=" @if($releve->etape_id >= 2) active @endif " id="step2">
                <div class="d-none d-md-block">Payement</div>
            </li>
    	    <li class=" @if($releve->etape_id >= 3) active @endif " id="step3">
                <div class="d-none d-md-block">Dépôt</div>
            </li>
            <li class=" @if($releve->etape_id >= 4) active @endif " id="step4">
                <div class="d-none d-md-block">Impression</div>
            </li>
            <li class=" @if($releve->etape_id >= 5) active @endif " id="step5">
                <div class="d-none d-md-block">Vérification</div>
            </li>
            <li class=" @if($releve->etape_id >= 6) active @endif " id="step6">
                <div class="d-none d-md-block">Signature</div>
            </li>
            <li class=" @if($releve->etape_id >= 7) active @endif " id="step7">
                <div class="d-none d-md-block">Fin traitement</div>
            </li>
        </ul>
    </div>
@else
    <div class="container text-center">
        <h2 class="">Aucune demande de relevé en cours.</h2>
    </div>
@endif
@endsection
