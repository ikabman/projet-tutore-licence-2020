<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function etudiant(){
        return $this->belongsTo('App\Etudiant');
    }
}
