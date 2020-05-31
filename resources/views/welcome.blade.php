<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Accueil</title>
    <!-- Style -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css"/>
    <style>
    html{
        min-height:100%;
    }

    html, body{
        background-color:rgb(0, 0, 0, 0.05);
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
    h1{
        font-size: 1.5em;
        margin-top: 2%;
    }
    p{
        text-align: justify;
    }
    .sticky-footer{
        padding: 2%;
    }
    .etape{
        border-left: 4px solid #2a5d84;
        padding-left: 4px;
        margin-bottom: 2%;
    }
    .titre{
        color: #2a5d84;
        font-weight: bold;
    }
    .texte{
        color: #2a5d84;
        font-style: italic;
    }
    .nb{
        color: red;
        text-decoration: underline;
        font-weight: bold;
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
    <div class="container">
            <h1 class="text-center">Bienvenue</h1>
            <p>Vous êtes étudiant à l'Univerisité de Lomé, vous avez besoin de
                votre relevé de notes ou vous désirez faire une réclamation de note?
                vous êtes au bon endroit.
            </p>
            <p>Comment procéder?</p>
            <p class="etape">
                <span class="titre">Etape 1:</span> <span class="texte">Créer un compte</span><br/>
                Cliquer sur le lien s'incrire au niveau de la barre de navigation, remplissez ensuite les informations demandées
                par le formulaire. Une fois la création de compte effectuée, vous serez rediriger vers le page de connexion.
            </p>
            <p class="etape">
                <span class="titre">Etape 2:</span> <span class="texte">Se connecter</span> <br/>
                Cliquer sur le lien se connecter au niveau de la barre de navigation, Mettez-y votre email et votre mot de passe
                précédement saisis lors de l'inscription, validez, vous accéderez alors à votre page d'accueil.
            </p>
            <p class="etape">
                <span class="titre">Etape 3:</span> <span class="texte">Faire une demande</span><br/>
                Pour faire une demande deux choix s'offrent à vous: La demande de relevé et la réclamation de note.
                <ul>
                    <li><span class="texte">Demande de relevé: </span><br/>
                        <p>
                            Cliquez sur le bouton "Demande de relevé" et remplissez le formulaire qui vous est présenté puis validez, vous
                            serez redirigez vers la page de suivie et pourrez constater le succès de l'enrégistrement de votre demande.<br/>
                            <span class="nb">NB:</span> Tant que votre demande n'est pas complètement traitée  vous ne pourrez en effectuée une autre.
                        </p>
                    </li>
                    <li><span class="texte">Réclamation de note: </span><br/>
                        <p>
                            Cliquez sur le bouton "Réclamation de notes" et remplissez le formulaire qui vous est présenté puis validez, vous
                            serez redirigez vers la page de suivie et pourrez constater le succès de l'enrégistrement de votre demande.<br/>
                            <span class="nb">NB:</span> Vous avez la possibilité d'effectuer une réclamation de notes pour plusieurs matières à la fois via le bouton
                            plus juste en dessous du formulaire
                        </p>
                    </li>
                </ul>
            </p>
            <p class="etape">
                <span class="titre">Etape 4:</span> <span class="texte">Effectuer le payement</span><br/>
                Une fois votre demande enrégistrée, vous trouverez dans le menu latéral à gauche une lien payement,
                grâce auquel vous accéderez à la page présentant les informations relatives à votre demande pour
                effectuer le payement auprès de nos partenaires. Les montants liés aux différentes demandes conformément
                aux réglémentations de l'Université de Lomé sont fixés comme suit:
                <ol>
                    <li>2000 FCFA/UE pour les réclamations de notes</li>
                    <li>500 FCFA pour le rélevé provisoire</li>
                </ol>
                Des frais d'opérations liés à nos partenaires peuvent y être ajoutés.<br/>
                <span class="nb">NB:</span> Le relevé définitif est gratuit.
            </p>
            <p class="etape">
                <span class="titre">Etape 5:</span> <span class="texte">Suivre vos différentes demandes</span><br/>
                Une fois le payement effectué, vous pourrez suivre l'évolution  de votre demande jusqu'à son aboutissement
                en cliquant sur le liens relevés ou  réclamations dans votre menu.Vous serez notifier une fois le processus
                terminé. Connectez-vous régulièrement pour être au courant de l'évolution de votre demande.
            </p>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020</span>
          </div>
        </div>
    </footer>
</body>
</html>
