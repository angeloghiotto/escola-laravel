<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Certificados;
use App\Alunos;

class EscolaController extends Controller {

    //
    public function top100Alunos() {
        $top100Alunos = Certificados::top100Alunos();
        $data['top100Alunos'] = $top100Alunos;
        return view('top100', $data);
    }

    public function topCursosMais100Cert() {
        $topCursos = Certificados::plus100CertCursos();
        $data['topCursos'] = $topCursos;
        return view('topCursos', $data);
    }

    public function todosAlunos() {
        $todosAlunos = Alunos::all();
        $data['todosAlunos'] = $todosAlunos;
        return view('todosAlunos', $data);
    }

    public function cursosAluno(Request $request) {
        $id_aluno = $request->post('id_aluno');
        $cursos = Certificados::certificadosAluno($id_aluno);
        return response()->json($cursos)->header('Content-Type', 'application/javascript');
    }

}
