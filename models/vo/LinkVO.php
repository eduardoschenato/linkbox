<?php

namespace Model\VO;

final class LinkVO extends VO {

    private $link;
    private $titulo;
    private $descricao;
    private $palavrasChave;
    private $imagem;
    private $idCategoria;
    private $nomeCategoria;

    public function __construct($id = 0, $link = "", $titulo = "", $descricao = "", $palavrasChave = "", $imagem = "", $idCategoria = 0, $nomeCategoria = "") {
        parent::__construct($id);
        $this->link = $link;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->palavrasChave = $palavrasChave;
        $this->imagem = $imagem;
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPalavrasChave() {
        return $this->palavrasChave;
    }

    public function setPalavrasChave($palavrasChave) {
        $this->palavrasChave = $palavrasChave;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    public function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

}