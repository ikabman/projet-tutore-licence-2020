<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniteEnseignement extends Model
{
    protected $guarded = [];

    public function reclamation(){
        return $this->belongsTo('App\Reclamation');
    }
}
