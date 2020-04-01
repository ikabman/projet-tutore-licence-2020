<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Releve extends Model
{
    protected $guarded = [];

    public function demande(){
        return $this->morphOne('App\Demande', 'demandeable');
    }
}
