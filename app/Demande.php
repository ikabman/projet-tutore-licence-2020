<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $guarded = [];

    public function etudiant(){
        return $this->belongsTo('App\Etudiant');
    }

    public function etape(){
        return $this->belongsTo('App\Etape');
    }

    public function demandeable()
    {
        return $this->morphTo();
    }
}

