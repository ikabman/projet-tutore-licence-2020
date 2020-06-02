@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <h1 class="text-center" style="font-size: 2em; color: #4e73df">Informations de payement</h1>
            </p>
            <table class="table table-sm table-hover table-bordered table-primary">
                <thead>
                  <tr>
                    <th scope="col">Identifiant de payement</th>
                    <th scope="col">Type de demande</th>
                    <th scope="col">Date de dépôt</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Payement</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($infoPayements as $infos)
                    <tr>
                        <td style="background-color: white"><b>{{$infos->id}}</b></td>
                        <td style="background-color: white">@if($infos->type == 'App\Releve') {{__('Relevé')}} @else {{__('Réclamation')}} @endif</td>
                        <td style="background-color: white">{{$infos->date}}</td>
                        <td style="background-color: white">{{$infos->montant}} FCFA</td>
                        <td style="background-color: white">@if($infos->confirmation == 1) <span class="text-success">{{__('Oui')}}</span>@else <span class="text-danger">{{__('Non')}}</span> @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
