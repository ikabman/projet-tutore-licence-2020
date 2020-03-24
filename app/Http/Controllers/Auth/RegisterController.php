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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUtilisateurRegisterForm()
    {
        return view('auth.register', ['url' => 'utilisateur']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEtudiantRegisterForm()
    {
        return view('auth.register_e', ['url' => 'etudiant']);
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
        $this->validator($request->all())->validate();
        Utilisateur::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
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
        $this->validator($request->all())->validate();
        Etudiant::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'numero_carte' => $request->numero_carte,
            'option' => $request->option,
        ]);
        return redirect()->intended('login/etudiant');
    }

}
