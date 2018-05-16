<?php

namespace App;

use Eloquent;

class Cursos extends Eloquent {
    
    public $timestamps = false;

    protected $fillable = array('nome',
        'inativo');
    
     // DEFINE RELATIONSHIPS --------------------------------------------------
    public function certificados() {
        return $this->belongsTo('App\Certificados');
    }

}
