<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Auth::routes();
Auth::logout();

Route::get('/login/utilisateur', 'Auth\LoginController@showUtilisateurLoginForm');
Route::get('/login/etudiant', 'Auth\LoginController@showEtudiantLoginForm');
#Route::get('/register/utilisateur', 'Auth\RegisterController@showUtilisateurRegisterForm'); méthode renommée newAdmin() dans UtilisateurControlleur
Route::get('/register/etudiant', 'Auth\RegisterController@showEtudiantRegisterForm');

Route::post('/login/utilisateur', 'Auth\LoginController@utilisateurLogin');
Route::post('/login/etudiant', 'Auth\LoginController@etudiantLogin');
#Route::post('/register/utilisateur', 'Auth\RegisterController@createUtilisateur');
Route::post('/register/etudiant', 'Auth\RegisterController@createEtudiant');

Route::view('/home', 'home')->middleware('auth');

##Route des resources Controller Etudiant
Route::get('/etudiants', 'EtudiantsController@index');#page acceuil pr etudiant
Route::get('/etudiants/reclamations/create', 'ReclamationsController@create');#page de etudiant pour faire une reclamation
Route::post('/reclamations', 'ReclamationsController@store');#stockage d'une reclamation
Route::get('/etudiants/releves/create', 'RelevesController@create');#page de etudiant pour faire une demande releve
Route::post('/releves', 'RelevesController@store');#stockage reclamation
Route::get('/etudiants/releves/etapes', 'RelevesController@etape');#
Route::get('/etudiants/reclamations/etapes', 'ReclamationsController@etape');#
Route::post('/etudiants/notifications/lu', 'EtudiantsController@notification');#Pour marquer une notification comme lu
Route::get('/edit/etudiant', 'EtudiantsController@edit');
Route::post('/edit/etudiant', 'EtudiantsController@update');
Route::get('/etudiants/payement', 'EtudiantsController@payement');

##Route des resources Controller Utilisateur
Route::get('/utilisateurs', 'UtilisateursController@index');#acceuil utilisateur
Route::get('/utilisateurs/releves', 'RelevesController@index');#page de recap de releve
Route::get('/utilisateurs/reclamations', 'ReclamationsController@index');#page de recap de reclamation
Route::get('/utilisateurs/reclamations/depots', 'EtapeReclamationController@depots');# page index des reclamations a l'etape depot
Route::get('/utilisateurs/reclamations/verifications', 'EtapeReclamationController@verifications');# page index des reclamations a l'etape verification
Route::get('/utilisateurs/reclamations/traites', 'EtapeReclamationController@traites');# page index des reclamations a l'etape traite
Route::get('/utilisateurs/releves/depots', 'EtapeReleveController@depots');# page index des releves a l'etape depot
Route::get('/utilisateurs/releves/impressions', 'EtapeReleveController@impressions');# page index des releves a l'etape impression
Route::get('/utilisateurs/releves/verifications', 'EtapeReleveController@verifications');# page index des releves a l'etape Verification
Route::get('/utilisateurs/releves/signatures', 'EtapeReleveController@signatures');# page index des releves a l'etape Signature
Route::get('/utilisateurs/releves/traites', 'EtapeReleveController@traites');# page index des releves a l'etape Traite

###Création d'un nouvel administrateur
Route::get('/register/utilisateur', 'UtilisateursController@create');
Route::post('/register/utilisateur', 'UtilisateursController@store');

#Modification des informations personnelles de l'administrateur
Route::get('/edit/utilisateur', 'UtilisateursController@edit');
Route::post('/edit/utilisateur', 'UtilisateursController@update');

##Action administrateur
Route::post('/utilisateurs/actions', 'UtilisateursController@passage');
