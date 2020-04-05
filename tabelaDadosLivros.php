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


// atualiza��o de intens
if ($acao == "atualizar") {
    if (!empty($nome) && !empty($autor) && !empty($anoPublicacao) && !empty($dataAquisicao) && !empty($editora)) {
        //$preco = str_replace(",", ".", $preco); // troca v�rgula por ponto

        
            $res = mysqli_query($con, "UPDATE livros SET nome= '$nome', autores='$autor', anoPublicacao='$anoPublicacao', dataAquisicao='$dataAquisicao', editora='$editora' WHERE id=$cod");
            echo "atualizouLivro";
        
    } else {
        echo "Você deve preencher todos os campos!";
    }
}
// exclusão de intens
elseif ($acao == "excluir") {
    $res = mysqli_query($con, "DELETE FROM livros WHERE id=$cod");
    echo "excluiu";
}

// cadastro de intens
elseif ($acao == "cadastrar") {
    if (!empty($nome) && !empty($preco)) {
        $preco = str_replace(",", ".", $preco); // troca v�rgula por ponto
        if (is_numeric($preco)) {
            $res = mysqli_query($con, "INSERT INTO intens(nome,preco) VALUES ('$nome','$preco')");
            $novoCodigo = mysqli_insert_id($con);
            // retorna a palavra "cadastrou" seguida do c�digo gerado para o intens
            echo "cadastrouLivro-$novoCodigo";
        } else {
            echo "Preço inválido!";
        }
    } else {
        echo "Para cadastrar deve preencher todos os campos!";
    }
}
?>