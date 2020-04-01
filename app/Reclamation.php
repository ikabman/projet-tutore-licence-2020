<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $guarded = [];

    public function demande(){
        return $this->morphOne('App\Demande', 'demandeable');
    }

    public function unite_enseignement(){
        return $this->hasMany('App\UniteEnseignement');
    }

}
