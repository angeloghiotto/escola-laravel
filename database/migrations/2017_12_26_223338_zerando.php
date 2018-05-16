<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Zerando extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('certificados');
        Schema::dropIfExists('alunos');

        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matriculado');
            $table->date('datacadastro');
            $table->string('nome', 100);
            $table->string('email', 100);
            $table->string('senha', 20);
            $table->string('telefone', 25);
            $table->date('data_nascimento');
        });

        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('alunos_id');
            $table->integer('cursos_id');
            $table->date('datamatricula');
            $table->date('dataconclusao');
            $table->double('nota', 10, 2);
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inativo');
            $table->string('nome', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
