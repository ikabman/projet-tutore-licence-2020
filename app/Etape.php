<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $guarded = [];

    public function demandes(){
        return $this->hasMany('App\Demande');
    }

}
