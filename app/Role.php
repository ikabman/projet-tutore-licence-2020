<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function utilisateurs(){
        return $this->hasMany('App\Utilisateur');
    }
}
