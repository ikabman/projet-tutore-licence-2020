<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<!--local bootstrap for offline coding-->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
	<style>
		body{
			background-color:rgba(0, 0, 0, 0.03);
		}
	</style>
</head>
<body style="margin-top:5%">
    <div class="container">
        <div class="row" style="margin-bottom:5%">
            <div class="offset-md-3 ol-md-8">
                <legend>Bienvenue, accedez à votre espace d'administration</legend>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="offset-md-2 col-md-8 col-form-label text-md-left">{{ __('Email') }}</label>

                                <div class="offset-md-2 col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mot_de_passe" class="offset-md-2 col-md-8 col-form-label text-md-left">{{ __('Mot de passe') }}</label>

                                <div class="offset-md-2 col-md-8">
                                    <input id="password" type="password" class="form-control @error('mot_de_passe') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Connexion') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
