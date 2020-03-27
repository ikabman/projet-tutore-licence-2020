<!--
    Titre: login_e
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
    </head>

    <body>
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 login-sec">
                        <h2 class="text-center">{{ __('Connexion') }} {{ isset($url) ? ucwords($url) : ""}}</h2>
                        @isset($url)
                        <form class="login-form" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form class="login-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf

                            <div class="form-group email">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Identifiant ou email') }}">
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
                                        <a class="float-right" href="{{ route('password.request') }}">
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
                                <small>Pas de compte?<a href="#"> S'inscrire</a></small>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-8 banner-sec">
                        <div>
                            <div class="banner-text">
                                <h2>Relevé et Reclamation de notes</h2>
                                <h4>Etape 1</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incidid quis nostrud exercitation</p>
                                <h4>Etape 2</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incidid quis nostrud exercitation</p>
                                <h4>Etape 3</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incidid quis nostrud exercitation</p>
                                <h4>Etape 4</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incidid quis nostrud exercitation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
