<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "EscolaController@top100Alunos");
Route::get('/cursos', "EscolaController@topCursosMais100Cert");
Route::get('/tabela', "EscolaController@todosAlunos");
Route::post('/infoAluno',"EscolaController@cursosAluno");