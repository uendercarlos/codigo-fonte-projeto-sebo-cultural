<?php

$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-Type: text/html; charset=IS0-8859-1");
include "conecta.php";


$cod = isset($_GET['cod']) ? $_GET['cod'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
$autor = isset($_GET['autor']) ? $_GET['autor'] : '';
$anoPublicacao = isset($_GET['anoPublicacao']) ? $_GET['anoPublicacao'] : '';
$dataAquisicao = isset($_GET['dataAquisicao']) ? $_GET['dataAquisicao'] : '';
$editora = isset($_GET['editora']) ? $_GET['editora'] : '';
$volume = isset($_GET['volume']) ? $_GET['volume'] : '';
$assunto = isset($_GET['assunto']) ? $_GET['assunto'] : '';

// atualizaco de intens
if ($acao == "atualizar") {
    if (!empty($nome) && !empty($autor) && !empty($anoPublicacao) && !empty($dataAquisicao) && !empty($editora) && !empty($volume)&&!empty($assunto)) {
        //$preco = str_replace(",", ".", $preco); // troca v�rgula por ponto

       
            $res = mysqli_query($con, "UPDATE revistas SET nome= '$nome', autores='$autor', anoPublicacao='$anoPublicacao', dataAquisicao='$dataAquisicao', editora='$editora', volume=$volume, assunto='$assunto' WHERE id=$cod");
            echo "atualizouRevista";
       
    } else {
        echo "Você deve preencher todos os campos!";
    }
}
// exclusão de intens
elseif ($acao == "excluir") {
    $res = mysqli_query($con, "DELETE FROM revistas WHERE id=$cod");
    echo "excluiu";
}

?>