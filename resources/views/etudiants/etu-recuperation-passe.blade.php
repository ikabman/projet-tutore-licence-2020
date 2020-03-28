<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background: rgb(216, 210, 210);
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            margin: auto;
        }

        .card {
            margin: auto;
            width: 450px;
            box-shadow: black 1px 1px 2px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center"><span class="splash-description">Veuillez entrer les informations de votre utilisateur.</span></div>
            <div class="card-body">
                <form>
                    <p>Un Email de reinitialisation vous sera envoyé.</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Votre Email">
                    </div>
                    <div class="form-group pt-1"><a class="btn btn-block btn-primary btn-xl" href="#">Valider</a></div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span>Pas de compte ? <a href="#">S'inscrire</a></span>
            </div>
        </div>
    </div>
</body>


</html>
