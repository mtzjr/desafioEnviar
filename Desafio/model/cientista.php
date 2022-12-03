<?php
require_once("banco.php");

class Cientista extends Banco {

    private $nome;
    private $cpf;
    private $senha;
    private $dtNasc;
    private $email;
    private $emailAlt;
    private $lattes;
    private $snh;
    
    public function setNome($string){
        $this->nome = $string;
    }
    public function setCpf($string){
        $this->cpf = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }
    public function setDtNasc($string){
        $this->dtNasc = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setEmailAlt($string){
        $this->emailAlt = $string;
    }
    public function setLattes($string){
        $this->lattes = $string;
    }
    public function setSnh($string){
        $this->snh = $string;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getDtNasc(){
        return $this->dtNasc;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEmailAlt(){
        return $this->emailAlt;
    }
    public function getLattes(){
        return $this->lattes;
    }
    public function getSnh(){
        return $this->snh;
    }

    public function incluir(){
        return $this->setCadastro($this->getNome(),$this->getCpf(),$this->getSenha(),$this->getDtNasc(),$this->getDtNasc(),$this->getEmail(),$this->getEmailAlt(),$this->getLattes(),$this->getSnh());
    }
}
?>
