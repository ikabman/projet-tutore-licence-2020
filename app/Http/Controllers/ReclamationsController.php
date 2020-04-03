<?php

namespace App\Http\Controllers;

use App\Reclamation;
use App\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReclamationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:etudiant');
    }

    ##Fonction qui s'occupe de valider les demandes de reclamation
    public function validatorReclamation(array $data)
    {
        return Validator::make($data, [
            'code' => 'required|string|max:255',
            'libelle' => 'required|string|max:255',
            'note_obtenue' => 'required|string|max:20',
            'note_reclame' => 'required|string|max:20',
            'type_note' => 'required|string|max:255',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.etu-reclamation-note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = Auth::user();

        $this->validatorReclamation($request->all())->validate();
        #Creation de la reclamation
        $dr = Reclamation::create([]);

        #Creation de l'unite d'enseignement
        $dr->unite_enseignement()->create([
            'code' => $request->code,
            'libelle' => $request->libelle,
            'note_obtenue' => $request->note_obtenue,
            'note_reclame' => $request->note_reclame,
            'type_note' => $request->type_note,
        ]);

        #Creation de la demande
        $dr->demande()->create([
            'demandeable_id' => $dr->id,
            'date_depot' => date('Y-m-d H:i:s'),
            'etat' => 'En cours',
            'etudiant_id' => $etudiant->id,
            'etape_id' => 1,
        ]);

        ##Doit declencher le middleware de payement et apres retour vers ?? apres retouner sur l'acceuil avec un message lui disant que la demande a été enregistré
        ##Le retour doit se faire sur une page avec le layout avk un msg "Votre demande de reclamation a ete bien enregistre"
        ##On fait un return back pour l'instant after on decidera quoi faire
        return back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
