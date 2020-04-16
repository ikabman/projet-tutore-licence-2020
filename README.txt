=================== NOTES =====================
*Sur le diagramme actualisé y'a une erreur - table Option - elle est lie a etudiant et non a etablissement
*
=== MODELS ===
bdd: releve_reclamation_v3

1- Demande
2- Etablissement
3- Etape
4- Etudiant
5- Option
6- Reclamation
7- Releve
8- Role
9- UniteEnseignement
10- Utilisateur
11- Notification => Pas créé car Laravel implemente une façon de faire les migrations

=== IMPLEMENTATION DES MIGRATIONS ===
    *foreign keys
1- create_etudiants_table
                -> etablissement_id
                -> option_id
2- create_utilisateurs_table
                -> etablissement_id
                -> role_id
3- create_notifications_table
                -> etudiant_id
4- create_demandes_table
                -> etudiant_id
                -> etape_id
5- create_unite_enseignements_table
                -> reclamation_id

=== SYSTEME MULTI AUTH V4 ===
-> model etudiant
-> model Utilisateur
-> guards (auth.php)
-> providers (auth.php)
-> LoginController
            * vue auth.login_utilisateur_
            * route '/utilisateurs' => utilisateurs.index
            * vue auth.login_etudiant_
            * route '/etudiants' => etudiants.index
-> RegisterController
            * vue auth.register_utilisateur_
            * vue auth.register_etudiant_
            * route 'login/utilisateur' => auth.login_utilisateur
            * route 'login/etudiant' => auth.login_etudiant
            ** creation de validatorEtudiant et validatorUtilisateur ##Remplace validator
            ** form Inscription Utilisateur et Etudiant -|- Renvoyer comme value 'id pour les foreignKeys -|-
-> modifications de login_etudiant
-> modifications de login_utilisateur
-> ajout des fichiers css ds public
-> auth.blade.php #Pas fait
-> home.blade.php
-> creation GlobalController pr tt ce qui concerne les injections de donnees et autres controls dans les vues
        ex: vues des inscriptions ont besoin de -|-options-|-etablissements-|-roles
->

=== SYSTEME MULTI AUTH V3* ===
Les modifs = branch authenticate* vient de old-state
1- LoginController
        * auth.login => auth.login_utilisateur
        * auth.login_e => auth.login_etudiant
        * j'ai créé UtilisateursController et EtudiantsController
2- RegisterController
        * validatorUtilisateur
        * validatorEtudiant
        *
branch migrate
1-
=== RelevesControllers ===
1- Ajout du champ type_releve ds la table Releve
2- On doit créé un middleware only('store') pr controller le payement.
3- Etapes - id
        * releve
    'Depôt' -> 1
	'Imprimé' -> 2
	'Vérification' -> 3
    'Signature' -> 4
	'Traité' -> 5
        * reclamation
    'Depôt' -> 6
	'Vérification' -> 7
	'Traité' -> 8
4- Pour les routes des resources Controllers pour @create seront nommés de la manière suivante :
    *Etudiants :
        .Prefix -> /etudiants
        .On y ajoute la nomenclature conventionnelle
        .Ex: la route pour les demandes de releve pour un etudiant sera -> /etudiants/releves/create
    *Utilisateur :
        .Prefix -> /utilisateurs
        .On y ajoute la nomenclature conventionnelle
        .Ex: _____
    *Justification :
        .Si l'on ne fait pas de cette façon le "Handler" va tenter en vain de rediriger l'etudiant vers la page de login
        .Or il ne reussira pas car l'etudiant sera déjà connecté donc le lien retournera sans cesse vers la même page.
        .Ne pas faire de même pr les methodes avk pr action qutre que 'get' - ça ne marche pas!
5- Pre-requis de 4:
    *Etudiants :
        .Le middleware doit être "auth:etudiant"
    *Utilisateur :
        .Le middleware doit être "auth:utilisateur"
        .On pourra en fonction des 'resouces' utiliser 'only' et 'except' sur les middleware

6- Requêtes nécessaires pour les donnees utilisateur
    * Selectionner tous les étudiants inscrits dans un etablissement donné
    * Les demandes de reclamation pour un etablissement donné
    * Les demandes de releve pour un etablissement donné
    * Le nbre de dmd de rel temporaires pr en ets donné
    * Le nbre de dmd de rel definitifs pr en ets donné

    Requete 1:
        * Selectionner tous les étudiants inscrits dans un etablissement donné
        $etudiants = DB::select('
            SELECT *
            FROM etudiants e
            WHERE e.etablissement_id ='.$utilisateur->etablissement_id;
        );
            .Tables concernés :
                -> etudiants
                -> utilisateurs
                -> etablissements

        * Les demandes de reclamation pour un etablissement donné
        $reclamations = DB::select('
            SELECT r.id
            FROM reclamations r, demandes d, etudiants e
            WHERE r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
            .Tables concernés :
                -> reclamations
                -> demandes
                -> etudiants
                -> etablissements
                -> utilisateurs

        * Les demandes de releve pour un etablissement donné
        $releves = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e
            WHERE r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
            .Tables concernés :
                -> releves
                -> demandes
                -> etudiants
                -> etablissements
                -> utilisateurs

        * Le nbre de dmd de rel temporaires pr en ets donné
        $rel_temp = DB::select('
            SELECT *
            FROM releves r, demandes d, etudiants e
            WHERE r.type_releve = "definitif"
            AND r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
            .Tables concernés :
                -> releves
                -> demandes
                -> etudiants
                -> etablissements
                -> utilisateurs

        * Selectionner les demandes pr un ets donné
        $demandes = DB::select('
            SELECT *
            FROM demandes d, etudiants e
            WHERE d.etudiant_id = e.id
            AND e.etablissement_id ='.$utilisateur->etablissement_id
        );
            .Tables concernés :
                -> demandes
                -> etudiants
                -> etablissements
                -> utilisateurs
7- Creation de EtapeReclamationsController et EtapeReleveController
    Il permet de gerer les donnees utilisateurs lorsqu'il doit acceder aux pages des
    differentes etapes pour les releves et les reclamations


    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*--*-*--*-*-**-*-*-**-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    Modifications






































