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
	<nav class="navbar navbar-expand-md shadow-sm navigation" style="margin-bottom:5%">
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
						<a class="nav-link lien" href="/login/utilisateur">Se connecter</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
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
                                        <a class="btn btn-link" href="#">
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
