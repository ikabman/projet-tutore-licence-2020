@extends('layouts.layout-admin')
@section('contenu-admin')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <span class="text-left h1" style="font-size: 2em; color: #4e73df">Tous les administrateur </span>
                <a class = "btn btn-primary text-right" href="/register/utilisateur">Creer un admin</a>
            </p>
            <table class="table table-sm table-hover table-bordered table-secondary">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td style="background-color: white"><b>{{$admin->id}}</b></td>
                        <td style="background-color: white">{{$admin->name}}</td>
                        <td style="background-color: white">{{$admin->first_name}}</td>
                        <td style="background-color: white">{{$admin->libelle}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
