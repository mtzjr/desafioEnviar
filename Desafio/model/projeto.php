<?php
require_once("banco.php");

class Projeto extends Banco {

    private $titulo;
    private $dtInico;
    private $dtFim;
    private $resumo;
    private $visibilidade;

    public function setTitulo($string){
        $this->titulo = $string;
    }
    public function setDtInico($string){
        $this->dtInico = $string;
    }
    public function setDtFim($string){
        $this->dtFim = $string;
    }
    public function setResumo($string){
        $this->resumo = $string;
    }
    public function setVisibilidade($string){
        $this->visibilidade = $string;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    public function getDtInico(){
        return $this->dtInico;
    }
    public function getDtFim(){
        return $this->dtFim;
    }
    public function getResumo(){
        return $this->resumo;
    }
    public function getVisibilidade(){
        return $this->visibilidade;
    }

    public function incluirProjeto(){
        return $this->setCadastroProjeto($this->getTitulo(),$this->getDtInico(),$this->getDtFim(),$this->getResumo(),$this->getVisibilidade(),1);
    }
    public function excluirProjeto($nome){
        
    }
}
?>