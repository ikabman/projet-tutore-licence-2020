<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface Payement{

	/**
	*Cette fonction est chargée de renvoyer les informations liés à la demande
	*de l'étudiant ayant l'identifiant de payement passé en paramètre à l'API
	*de payement:  nom, prenom, numero de carte, filière, école, le motif de
	*la demande (relevé ou réclamation),	le montant dans un format à définir.
	*l'identifiant par défaut est l'id de la demande
	*/
	public function getInformations(Request $request);

	/**
	*Cette fonction est chargéé de persister dans la base de	données que le
	*payement a été effectué par l'étudiant via l'API de payement.
	*/
	public function setPayementEffectue(Request $request);

	/***
	*Cette fonction est chargée de confirmer le payement effectué via l'API
	*de payement dans la base de données pour l'identifiant de payement passé
	*en paramètre.
	*/
	public function setConfirmationPayement(Request $request);
}
