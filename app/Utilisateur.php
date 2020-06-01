<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $guard = 'utilisateur';

    protected $guarded = [];

    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Partie non auth */

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function etablissement(){
        return $this->belongsTo('App\Etablissement');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }
}
