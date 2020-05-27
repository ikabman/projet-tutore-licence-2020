<!--
Titre: register_utilisateur
Description: cette page remplace la page originel "admin-creation"
P.S: prendre en compte ce renommage; ne pas le changer.

----Changements effectués----------
1-
2- Ajout du champ etablissement ms commenté pr l moment*
3-
4- script sql pr 'role'
5- script sql pr 'etablissement'
6- Les donnees de role et etablissement st renvoyé via le 'showUtilisateurController'

----Reste à changer ----------
1- Ajouter les scripts de select de Option et de Faculté
2- css

--- warning ---
1- controllers renvoyer 'roles'
2-                      'etablissements'
-->
<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <!--local bootstrap for offline coding ->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css"/>
</head>
<body style="margin-top:5%">-->
@extends('layouts.layout-admin')
@section('contenu-admin')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 5%">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #4e73df; color: white">Création d'un nouvel administrateur</div>

                    <div class="card-body">
                        <!--@isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                            @else
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @endisset-->
                            <form method="POST" action="/register/utilisateur" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénoms') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Identifiant') }}</label>

                                    <div class="col-md-6">
                                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login">

                                        @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-8">
                                        <select class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement') }}">
                                            <option>{{ __('Faculté/Etablissement/Ecole') }}</option>
                                            @foreach($etablissements as $etablissement)
                                            <option value="{{$etablissement['id']}}">
                                                {{$etablissement['libelle']}} @if($etablissement['libelle_court']!=null)({{$etablissement['libelle_court']}})@endif
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('etablissement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-8">
                                        <select class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}">
                                            <option>{{ __('Role') }}</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role['id']}}">
                                                {{ $role['libelle'] }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Enrégistrer') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
        <!--</div>
    </body>
</html>-->
