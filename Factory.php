<?php


include_once 'Livros.class.php';
include_once 'Revistas.class.php';




$intens = $_GET ['intens'];

//formulario livros
if ($intens == "livros") {
    
   new livros($_POST ['nome'], $_POST ['dataAq'], $_POST ['listAutores'], $_POST ['nomeEditora'], $_POST ['anoPub']);
   header("location: form_livros.php");
   setcookie("cadastrouu","sim",time() + 2);

//formulario revistas   
}else if ($intens == "revistas") {
    
   new revistas($_POST ['nome'], $_POST ['dataAq'], $_POST ['listAutores'], $_POST ['nomeEditora'], $_POST ['anoPub'], $_POST ['volume'], $_POST ['assuntos']);
   header("location: form_revistas.php");
   setcookie("cadastrouu","sim",time() + 2); 
}
       
   
