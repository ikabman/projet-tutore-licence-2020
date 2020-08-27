<!--
    Titre: login_etudiant
    Description: cette page remplace la page originel "etu-connexion"
    P.S: prendre en compte ce renommage; ne pas le changer.

    ----Changements effectués----------
    1- Retrait de layouts->app
    2- Ajout de

    ----Reste à changer ----------
    1- Liens pour s'inscrire
    2- Liens "mot de passe oublié"
    3-
-->

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/etu-connexion.css" />
        <style>
            .lien{
                color:white;
            }
            .navigation{
                background-color:#2a5d84;
                padding: 0;
            }
            .lien:hover{
                color: yellow;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md shadow-sm navigation">
            <div class="container-fluid">
                <span class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <img src="/img/logo.png" alt="" style="width:60px; height: 80px"/>
                    </div>
                </span>
                <a class="navbar-brand lien" href="/">
                    Relevés et Réclamations
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link lien" href="/login/etudiant">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link lien" href="/register/etudiant">S'inscrire</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-4 col-lg-4 login-sec">
                        <h2 class="text-center">{{ __('Connexion') }} {{ isset($url) ? ucwords($url) : ""}}</h2>
                        @isset($url)
                        <form class="login-form" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form class="login-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf

                            <div class="form-group email">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group motDePasse">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Mot de passe') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        <small>{{ __('Se souvenir de moi') }}</small>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a class="float-right" href="#">
                                            <small>{{ __('Mot de passe oublié ?') }}</small>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary btn-xl">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            <div class="text-center">
                                <small>Pas de compte?<a href="/register/etudiant"> S'inscrire</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
