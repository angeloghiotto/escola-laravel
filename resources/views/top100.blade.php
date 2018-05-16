<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/escola.css">
        <!-- Latest compiled and minified CSS -->
    </head>
    <body>
        @include('toolbar')
        <ul>
            @foreach ($top100Alunos as $aluno)
            <li>Nome: {{ $aluno->nome }} - Num: certificados {{ $aluno->numCertificados }} </li>
            @endforeach
        </ul>

    </body>
</html>
