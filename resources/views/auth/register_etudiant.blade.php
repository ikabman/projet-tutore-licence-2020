<!--
    Titre: register_etudiant
    Description: cette page remplace la page originel "etu-inscription"
    P.S: prendre en compte ce renommage; ne pas le changer.

    ----Changements effectués----------
    1- Retrait de layouts->app
    2- Ajout du champ etablissement ms commenté pr l moment*
    3- titre => Inscription etudiant
    4- script sql pr 'option'
    5- script sql pr 'etablissement'

    ----Reste à changer ----------
    1- Ajouter les scripts de select de Option et de Faculté
    2-

    --- warning ---
    1- controllers renvoyer 'options'
    2-                      'etablissements'
-->

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Inscription étudiant</title>
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/etu-inscription.css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <h2>Déjà membre ?</h2>
                    <img src="/img/imageIndique.png" alt="" /><br>
                    <a href="#" class="btn btn-1">Se connecter</a><br/>
                </div>
                <div class="col-md-9 register-right">
                    <h2 class="register-heading">{{ __('Inscription') }} {{ isset($url) ? ucwords($url) : ""}}</h2>

                    @isset($url)
                    <form class="row register-form" method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                    @else
                    <form class="row register-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset
                        @csrf

                        <!--***-->
                        <div class="col-md-6">
                            <div class="form-group trait">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nom') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group trait">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="{{ __('Prénom') }}">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group trait">
                                <input id="numero_carte" type="number" class="form-control @error('numero_carte') is-invalid @enderror" name="numero_carte" value="{{ old('numero_carte') }}" required autocomplete="numero_carte" placeholder="{{ __('Numéro de carte') }}">

                                @error('numero_carte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group trait">
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
                            <div class="form-group trait">
                                <select class="form-control @error('option') is-invalid @enderror" name="option" value="{{ old('option') }}">
                                    <option>{{ __('Option/Departement/Filière') }}</option>
                                    @foreach($options as $option)
                                        <option value="{{$option['id']}}">
                                            {{$option['libelle']}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group trait">
                                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" placeholder="{{ __('Identifiant') }}">

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group trait">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group trait">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"  placeholder="{{ __('Numéro de telephone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group trait">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Mot de passe') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group trait">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmez le mot de passe') }}">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btnRegister btn-sm">
                                {{ __('S\'inscrire') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>






















