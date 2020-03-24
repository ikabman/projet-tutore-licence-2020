<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'utilisateur';

    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
