<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $guarded = [];

    public function etudiants(){
        return $this->hasMany('App\Etudiant');
    }

    public function utilisateurs(){
        return $this->hasMany('App\Utilisateur');
    }
}
