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
}
