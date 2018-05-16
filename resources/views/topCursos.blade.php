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
    </head>
    <body>
        @include('toolbar')
        <ul>
            @foreach ($topCursos as $curso)
            <li>Nome: {{ $curso->nome }} - Num: certificados {{ $curso->numCertificados }} </li>
            @endforeach
        </ul>

    </body>
</html>
