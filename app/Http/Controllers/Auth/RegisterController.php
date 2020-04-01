<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Utilisateur;
use App\Etudiant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:utilisateur');
        $this->middleware('guest:etudiant');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    */

    ## permet de valider les donnees envoyes par le form inscription etudiants
    protected function validatorEtudiant(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'option' => 'required|string|max:255',
            'numero_carte' => 'required|integer',
            'etablissement' => 'required|string|max:255',
        ]);
    }

    ## permet de valider les donnees envoyes par le form creation utilisateur
    protected function validatorUtilisateur(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    ##
    public function showUtilisateurRegisterForm()
    {
        $roles = \App\Role::select('id', 'libelle')->orderBy('libelle')->get();
        $etablissement= \App\Etablissement::select('id', 'libelle', 'libelle_court')->orderBy('libelle')->get();

        return view('auth.register_utilisateur', [
            'url' => 'utilisateur',
            'etablissements' => $etablissement,
            'roles' => $roles,
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEtudiantRegisterForm()
    {
        $options = \App\Option::select('id', 'libelle')->orderBy('libelle')->get();
        $etablissement= \App\Etablissement::select('id', 'libelle', 'libelle_court')->orderBy('libelle')->get();

        return view('auth.register_etudiant', [
            'url' => 'etudiant',
            'etablissements' => $etablissement,
            'options' => $options,
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createUtilisateur(Request $request)
    {
        $this->validatorUtilisateur($request->all())->validate();
        Utilisateur::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'etablissement_id' => $request->etablissement,
            'role_id' => $request->role,
        ]);
        return redirect()->intended('login/utilisateur');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createEtudiant(Request $request)
    {
        $this->validatorEtudiant($request->all())->validate();
        Etudiant::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'numero_carte' => $request->numero_carte,
            'etablissement_id' => $request->etablissement,
            'option_id' => $request->option,
        ]);
        return redirect()->intended('login/etudiant');
    }

}
