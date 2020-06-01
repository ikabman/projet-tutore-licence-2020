<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Etudiant;
use App\Releve;
use App\Reclamation;
use App\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:utilisateur');
    }

    /**
    *Cette fonction renvoie les relevés à une étape donnée
    *Elle est utile pour le pourcentage sur la page index de l'administrateur
    *Elle a été crée dans un soucis de factorisation des requêtes
    */
    public function releveEtape($etape){
        $utilisateur = Auth::user();

        $releves = DB::select('
            SELECT DISTINCT r.id
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "'.$etape.'"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );

        return $releves;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();

        #Selectionner le nbre d étudiants inscrits dans un etablissement donné
        $etudiants = DB::select('
        SELECT *
        FROM etudiants e
        WHERE e.etablissement_id ='.$utilisateur->etablissement_id
        );
        #COUNT
        $nEtudiants = COUNT($etudiants);

        #Le nbre de demandes de reclamation pour un etablissement donné
        $reclamations = DB::select('
            SELECT DISTINCT ue.id
            FROM reclamations r, demandes d, etudiants e, unite_enseignements ue
            WHERE r.id = d.demandeable_id
            AND ue.reclamation_id = r.id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nReclamations = COUNT($reclamations);

        #Le nbre de demandes de releve pour un etablissement donné
        $releves = DB::select('
            SELECT DISTINCT r.id
            FROM releves r, demandes d, etudiants e
            WHERE d.demandeable_id = r.id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nReleves = COUNT($releves);

        #Le nbre de dmd de rel definitifs pr en ets donné
        $rel_def = DB::select('
            SELECT DISTINCT r.id
            FROM releves r, demandes d, etudiants e
            WHERE r.type_releve = "definitif"
            AND r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nRel_def = COUNT($rel_def);

        #Le nbre de dmd de rel intermediaire pr en ets donné
        $rel_inter = DB::select('
            SELECT DISTINCT r.id
            FROM releves r, demandes d, etudiants e
            WHERE r.type_releve = "intermediaire"
            AND r.id = d.demandeable_id
            AND d.etudiant_id = e.id
            AND e.etablissement_id = '.$utilisateur->etablissement_id
        );
        #COUNT
        $nRel_inter = COUNT($rel_inter);

        #Selectionner les demandes pr un ets donné
        $demandes = DB::select('
            SELECT d.id, d.date_depot, d.etat, e.name, e.first_name, d.demandeable_type
            FROM demandes d, etudiants e
            WHERE d.etudiant_id = e.id
            AND e.etablissement_id ='.$utilisateur->etablissement_id.'
            LIMIT 3'
        );
        #Selection de l'établissement de l'administrateurs
        $etablissement = DB::select('SELECT libelle FROM etablissements WHERE id ='.$utilisateur->etablissement_id);
        $etablissement = $etablissement[0]->libelle;

        ##Pourcentage ops
        $Rel_depot = $this->releveEtape("Dépôt");
        $nRel_depot = COUNT($Rel_depot);
        if($nReleves > 0){
            $p_depot = 100 * ($nRel_depot/$nReleves);
        }
        else{
            $p_depot = 0;
        }

        $Rel_imprime = $this->releveEtape("Imprimé");
        $nRel_imprime = COUNT($Rel_imprime);
        if($nReleves > 0){
            $p_imprime = 100 * ($nRel_imprime/$nReleves);
        }
        else{
            $p_imprime = 0;
        }

        $Rel_verification = $this->releveEtape("Vérification");
        $nRel_verification = COUNT($Rel_verification);
        if($nReleves > 0){
            $p_verification = 100 * ($nRel_verification/$nReleves);
        }
        else{
            $p_verification = 0;
        }

        $Rel_signature = $this->releveEtape("Signature");
        $nRel_signature = COUNT($Rel_signature);
        if($nReleves > 0){
            $p_signature = 100 * ($nRel_signature/$nReleves);
        }
        else{
            $p_signature = 0;
        }

        $Rel_traite = $this->releveEtape("Traité");
        $nRel_traite = COUNT($Rel_traite);
        if($nReleves > 0){
            $p_traite = 100 * ($nRel_traite/$nReleves);
        }
        else{
            $p_traite = 0;
        }

        $active = "dashboard";
        return view('utilisateurs.index', compact([
            'nEtudiants',
            'nRel_inter',
            'nRel_def',
            'nReleves',
            'nReclamations',
            'demandes',
            'p_traite',
            'p_signature',
            'p_verification',
            'p_imprime',
            'p_depot',
            'active',
            'etablissement'
        ]));
    }

    /**
    *Fonction utilisée pour le passage des demandes
    *d'une étape à une autre
    */
    public function passage(Request $request)
    {
        $data = $request->all();

        if($data['type'] == 'ue'){
            if($data['etape'] < 12){//8 pour chakir
                DB::table('unite_enseignements')
                ->where('id', $data['id'])
                ->update(['etape_id' => ($data['etape']+1)]);
            }
        }else if($data['type'] == 'releve'){
            if($data['etape'] < 7){//5 pour chakir
                DB::table('releves')
                ->where('id', $data['id'])
                ->update(['etape_id' => ($data['etape']+1)]);
            }
        }

        return response()->json(["status" => "ok"]);
    }

    ## permet de valider les donnees envoyes par le form creation utilisateur
    protected function validator(array $data)
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
     * Show the form for creating a new resource.
     *
     * Permet l'affichage du formulaire  exacte copy de showUtilisateurLoginForm()
     * désuet car la connexion par défaut empechant la création d'un nouvel utilisateur
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        L'administrateur ne peut créer que des administrateurs appartenant à
        son école et ayant des rôles inferieurs ou égales au sien
        puisque nous n'avons que deux rôles alors il est soit Administrateur ou
        observateur (condition if ci-dessous)
        */
        $administrateur = Auth::user();
        if($administrateur->role->libelle  == 'Administrateur'){
            $roles = \App\Role::select('id', 'libelle')->orderBy('libelle')->get();
        }else{
            $roles = \App\Role::select('id', 'libelle')
                            ->where('id', $administrateur->role_id)
                            ->orderBy('libelle')->get();
        }
        $etablissement = \App\Etablissement::select('id', 'libelle', 'libelle_court')
                                        ->where('id', $administrateur->etablissement_id)
                                        ->orderBy('libelle')
                                        ->get();

        $active = "administrateur";#Pour le menu latéral actif

        return view('auth.register_utilisateur', [
            'etablissements' => $etablissement,
            'roles' => $roles,
            'active' => $active
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * Permet l'affichage du formulaire  exacte copy de createUtilisateur()
     * désuet car la connexion par défaut empechant la création d'un nouvel utilisateur
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
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
        $active = "administrateur";#Pour le menu latéral actif
        $reussite = true;
        return view('auth.register_utilisateur', compact([
            'reussite',
            'active']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * Affiche dans le formulaire les informations de l'administrateur
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $administrateur =  Auth::user();
        $etablissements = \App\Etablissement::select('id', 'libelle', 'libelle_court')
                                        ->where('id', $administrateur->etablissement_id)
                                        ->orderBy('libelle')
                                        ->get();
        $roles = \App\Role::select('id', 'libelle')
                        ->where('id', $administrateur->role_id)
                        ->orderBy('libelle')->get();
        $active = "administrateur";#Pour le menu lateral actif
        return view('auth.update_utilisateur', compact([
            'administrateur',
            'etablissements',
            'roles',
            'active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * Permet la mise à jour des informations personnelles
     * de l'administrateur
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        $this->validator($request->all())->validate();
        DB::update('UPDATE utilisateurs SET '.
            'name =\''. $request->name.'\''.
            ', first_name =\''. $request->first_name.'\''.
            ', email =\''. $request->email.'\''.
            ', login =\''. $request->login.'\''.
            ', password =\''. Hash::make($request->password).'\''.
            ', phone =\''. $request->phone.'\''.
            ', etablissement_id ='. $request->etablissement.
            ', role_id ='. $request->role.
            ' WHERE id = '.Auth::id());
        $reussite = true; #Pour afficher le message de succès
        $active = "administrateur";#Pour le menu lateral actif
        return view('auth.update_utilisateur', compact([
            'reussite',
            'active']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
