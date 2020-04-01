===MODELS===
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

=== SYSTEME MULTI AUTH ===
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






















=================== NOTES =====================
*Sur le diagramme actualisé y'a une erreur - table Option - elle est lie a etudiant et non a etablissement

















































