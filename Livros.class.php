<?php
include_once 'Itens.class.php';
include "conecta.php";

class livros extends Itens {
    
    function __construct($nome,$dataAq,$listAutores,$nomeEditora,$anoPub) 
    {
         $this->cadastrarLivro($nome,$dataAq,$listAutores,$nomeEditora,$anoPub);
         
     } 
	
    function cadastrarLivro($nome,$dataAq,$listAutores,$nomeEditora,$anoPub){
		
        $host= 'localhost';
		$bd= '77759';
		$senhabd= 'Catitu.835835';
		$userbd = '77759';
		
		$conexao = mysqli_connect($host,$userbd,$senhabd,$bd) or die( 'Erro de conexao ao BD: '.mysqli_error( $conexao ) );


		$sql = "INSERT INTO livros (`nome`, `dataAquisicao`, `autores`, `editora`, `anoPublicacao`) 
		VALUES ('$nome','$dataAq','$listAutores', '$nomeEditora' , '$anoPub')";

		mysqli_query($conexao, $sql)or die( mysqli_error( $conexao ) );   
    }   
}
?>