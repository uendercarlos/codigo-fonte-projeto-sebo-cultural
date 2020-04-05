<?php



abstract class Itens {

    private $id;
    private $nome;
    private $dataAq;
    private $listAutores;
    private $nomeEditora;
    private $anoPub;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getDataAq() {
        return $this->dataAq;
    }

    function setDataAq($dataAq) {
        $this->dataAq = $dataAq;
    }

    function getListAutores() {
        return $this->listAutores;
    }

    function setListAutores($listAutores) {
        $this->listAutores = $listAutores;
    }

    function getNomeEditora() {
        return $this->nomeEditora;
    }

    function setNomeEditora($nomeEditora) {
        $this->nomeEditora = $nomeEditora;
    }

    function getAnoPub() {
        return $this->anoPub;
    }

    function setAnoPub($anoPub) {
        $this->anoPub = $anoPub;
    }

}

?>