<?php

namespace App;

use Eloquent;
use Illuminate\Support\Facades\DB;

class Certificados extends Eloquent {

    public $timestamps = false;
    protected $fillable = array('aluno_id',
        'matriculado',
        'datamatricula',
        'dataconclusao',
        'nota');

    // DEFINE RELATIONSHIPS --------------------------------------------------

    public function alunos() {
        return $this->hasMany('App\Alunos');
    }

    public function cursos() {
        return $this->hasMany('App\Cursos');
    }

    public static function top100Alunos() {
        $resultado = DB::table('certificados')
                ->selectRaw('certificados.alunos_id, alunos.nome, '
                        . 'COUNT(certificados.alunos_id) AS numCertificados')
                ->join('alunos', 'alunos.id', '=', 'certificados.alunos_id')
                ->groupBy('certificados.alunos_id')
                ->groupBy('alunos.nome')
                ->orderBy('numCertificados', 'desc')
                ->limit(100)
                ->get();
        return $resultado;
    }
    
    public static function plus100CertCursos(){
        /*
         *PS: No console funciona com numCertificados do HAVING, Laravel 
         *reportou bug, tive que usar COUNT de novo
         */
        $resultado = DB::table('certificados')
                ->selectRaw('cursos.id, cursos.nome,'
                        . ' COUNT(certificados.alunos_id) AS numCertificados')
                ->join('cursos', 'cursos.id', '=', 'certificados.cursos_id')
                ->groupBy('cursos.id')
                ->groupBy('cursos.nome')
                ->orderBy('numCertificados', 'desc')
                ->havingRaw('COUNT(certificados.alunos_id) > 100')
                ->get();
        return $resultado;
    }
    
     public static function certificadosAluno($id_aluno){
        /*
         *PS: No console funciona com numCertificados do HAVING, Laravel 
         *reportou bug, tive que usar COUNT de novo
         */
        $resultado = DB::table('certificados')
                ->selectRaw("cursos.nome, certificados.nota, "
                        ."DATE_FORMAT(certificados.datamatricula, '%d/%m/%Y') as dataInicio,"
                        ."DATE_FORMAT(certificados.dataconclusao, '%d/%m/%Y') as dataFinal")
                ->join('cursos', 'cursos.id', '=', 'certificados.cursos_id')
                ->where('certificados.alunos_id',$id_aluno)
                ->get();
        return $resultado->toJson();
    }
    

}
