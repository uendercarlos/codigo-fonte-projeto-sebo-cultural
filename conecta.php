<?php

$servidor = "localhost";
$usuario = "seu usuario";
$senha = "sua senha";
$dbname = "seu banco";

//criar conexao
$con = mysqli_connect($servidor, $usuario, $senha, $dbname)or die( 'Erro de conexao ao BD: '.mysqli_error( $conexao ) );



?>
