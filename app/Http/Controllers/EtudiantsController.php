<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EtudiantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:etudiant');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #Selection du nombre de notifications non lus
        $notifications = DB::select('SELECT id, contenu FROM notifications WHERE lu = 0 AND etudiant_id = '.Auth::id());
        $nombre =  COUNT($notifications);
        $active = "accueil";
        return view('etudiants.index', compact(['nombre','notifications', 'active']));
    }

    #fonction qui marque à lu la notification envoyé à l'étudiant
    public function notification(Request $request){
        $data = $request->all();
        DB::table('notifications')
        ->where('id', $data['notification_id'])
        ->update(['lu' => 1]);
    }

    /*
    Cette fonction renvoie les informations de payement
    d'un étudiant
    */
    public function payement(){
        $infoPayements = DB::select("SELECT d.id, d.montant, DATE_FORMAT(d.date_depot, '%d-%m-%Y') as date, d.confirmation, d.demandeable_type as type
                                     FROM demandes d
                                     WHERE etudiant_id = ".Auth::id());

        $active = "payement";#Pour l'activeation du menu latéral
        return view('etudiants.etu-payement', compact(['active', 'infoPayements']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *Affiche le formulaire de modification des informations personnelles
     *de l'étudiant
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $etudiant = Auth::user();
        return view('etudiants.etu-edit', compact(['etudiant']));
    }

    ## permet de valider les donnees envoyes par le form inscription etudiants
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $id = Auth::id();
        $this->validator($request->all())->validate();
        DB::update('UPDATE etudiants
                    SET name = ?, first_name = ?, email = ?,
                    login = ?, password = ?, phone = ?
                    WHERE id = ?
                    ', [$request->name, $request->first_name, $request->email,
                        $request->login, Hash::make($request->password),
                        $request->phone, Auth::id()
                       ]
                   );
       $reussite = true; #Pour afficher le message de succès
       $active = "accueil";#Pour le menu lateral actif
       return view('etudiants.etu-edit', compact([
           'reussite',
           'active']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }
}
