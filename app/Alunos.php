<?php

namespace App;

use Eloquent;

class Alunos extends Eloquent {

    public $timestamps = false;
    public $table = 'alunos';
    protected $fillable = array('matriculado',
        'datacadastro',
        'nome',
        'email',
        'senha',
        'telefone',
        'data_nascimento');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each bear climbs many trees
    public  function certificados() {
        return $this->belongsTo('App\Certificados');
    }

}
