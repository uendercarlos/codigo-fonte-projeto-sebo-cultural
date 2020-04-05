<?php
include_once 'Itens.class.php';

class revistas extends Itens {
  	
	private $volume;
	private $assuntos;
        
         function __construct($nome,$dataAq,$listAutores,$nomeEditora,$anoPub,$volume,$assuntos) 
    {
         $this->cadastrarRevista($nome,$dataAq,$listAutores,$nomeEditora,$anoPub,$volume,$assuntos);
         
     } 
	
	function getVolume(){
        return $this->volume;
    }
    function setVolume($volume){
        $this->volume = $volume;
    }
	function getAssuntos(){
        return $this->assuntos;
    }
    function setAssuntos($assuntos){
        $this->assuntos = $assuntos;
    }
	
	function cadastrarRevista($nome,$dataAq,$listAutores,$nomeEditora,$anoPub,$volume,$assuntos) {
		
		
		$host= 'localhost';
		$bd= '77759';
		$senhabd= 'Catitu.835835';
		$userbd = '77759';
		
		$conexao = mysqli_connect($host,$userbd,$senhabd,$bd) or die( 'Erro de conexao ao BD: '.mysqli_error( $conexao ) );



		$sql = "INSERT INTO revistas (`nome`, `dataAquisicao`, `autores`, `editora`, `anoPublicacao`, `volume`, `assunto`) 
		VALUES ('$nome','$dataAq','$listAutores', '$nomeEditora' , '$anoPub','$volume','$assuntos')";
                
		mysqli_query($conexao, $sql)or die( mysqli_error( $conexao ) );
    }
}
?>