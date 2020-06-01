<!--Cette page est utiliser pour la mise à jour des informatons personnelles
de l'administrateur-->
@extends('layouts.layout-admin')
@section('contenu-admin')
    @if(isset($reussite))
        <div class="row">
            <div class="col-lg-12">
                <p class="alert-success text-center" style="margin-bottom:40%;border-radius: 0.35rem; padding: 1.25rem">Vos informations personnelles ont été mis à jour avec succès</p>
            </di>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center" style="background-color: #4e73df; color: white">Modifications de vos informations personnelles</div>

                        <div class="card-body">
                                <form method="POST" action="/edit/utilisateur">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $administrateur->name }}" required autocomplete="name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénoms') }}</label>
                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $administrateur->first_name }}" required autocomplete="first_name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $administrateur->email }}" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $administrateur->phone }}" required autocomplete="phone">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Identifiant') }}</label>
                                        <div class="col-md-6">
                                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ $administrateur->login }}" required autocomplete="login">
                                        </div>
                                    </div>                                    

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                                                {{ __('Modifier') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
@endsection
