@extends('layouts.layout-admin')
@section('contenu-admin')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <h1 class="text-center" style="font-size: 2em; color: #4e73df">Demandes traitées</h1>
            </p>
            <table class="table table-sm table-hover table-bordered table-secondary">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th scope="col">Type de demande</th>
                    <th scope="col">Date de dépôt</th>
                    <th scope="col">Etudiant</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($historiqueReleves as $infos)
                    <tr>
                        <td style="background-color: white"><b>{{$infos->id}}</b></td>
                        <td style="background-color: white">Relevé {{$infos->type_releve}}</td>
                        <td style="background-color: white">{{$infos->date_depot}}</td>
                        <td style="background-color: white">{{$infos->name}} {{$infos->first_name}}</td>
                    </tr>
                    @endforeach
                    @foreach($historiqueReclamations as $infos)
                    <tr>
                        <td style="background-color: white"><b>{{$infos->id}}</b></td>
                        <td style="background-color: white">Réclamation {{$infos->code}}</td>
                        <td style="background-color: white">{{$infos->date_depot}}</td>
                        <td style="background-color: white">{{$infos->name}} {{$infos->first_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
