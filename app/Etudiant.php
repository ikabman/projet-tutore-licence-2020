<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'etudiant';

    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Partie non auth */

    public function option(){
        return $this->belongsTo('App\Option');
    }

    public function demandes(){
        return $this->hasMany('App\Demande');
    }

    public function etablissement(){
        return $this->belongsTo('App\Etablissement');
    }
}
