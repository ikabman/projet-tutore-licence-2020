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
Route::get('/register/utilisateur', 'Auth\RegisterController@showUtilisateurRegisterForm');
Route::get('/register/etudiant', 'Auth\RegisterController@showEtudiantRegisterForm');

Route::post('/login/utilisateur', 'Auth\LoginController@utilisateurLogin');
Route::post('/login/etudiant', 'Auth\LoginController@etudiantLogin');
Route::post('/register/utilisateur', 'Auth\RegisterController@createUtilisateur');
Route::post('/register/etudiant', 'Auth\RegisterController@createEtudiant');

Route::view('/home', 'home')->middleware('auth');

##
Route::get('/etudiants', 'EtudiantsController@index');
Route::get('/utilisateurs', 'UtilisateursController@index');
