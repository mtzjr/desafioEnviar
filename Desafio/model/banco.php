<?php
require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }
    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }
    public function setCadastro($nome,$cpf,$dtNasc,$email,$emailAlt,$lattes,$snh,$senha){
        $stmt = $this->mysqli->prepare("INSERT INTO cientista (`nom_cientista`, `cpf_cientista`, `dtn_cientista`, `email_cientista`, `email_alternativo_cientista`, `lattes_cientista`, `snh_cientista`, `senha_cientista`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss",$nome,$cpf,$dtNasc,$email,$emailAlt,$lattes,$snh,$senha);
         if($stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
    public function setCadastroProjeto($titulo,$dtInico,$dtFim,$resumo,$visibilidade,$fk){
        $stmt = $this->mysqli->prepare("INSERT INTO projeto (`tit_projeto`, `res_projeto`, `dti_projeto`, `dtt_projeto`, `pub_projeto`, `fk_id_cientista`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$titulo,$dtInico,$dtFim,$resumo,$visibilidade,$fk);
         if($stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
    public function getCientistas(){
        $result = $this->mysqli->query("SELECT * FROM cientista");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
    public function getProjeto(){
        $result = $this->mysqli->query("SELECT * FROM projeto");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
    public function deleteProjeto(){
        $usuario = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$usuario."';";
        $sql = $this->mysqli->prepare("DELETE FROM `projeto` WHERE `fk_id_cientista` = '".$id."';");
        $sql->execute();
    }
    public function deleteCientista($nome){
        if($this->mysqli->query("DELETE FROM `cientista` WHERE `nom_cientista` = '".$nome."';")== TRUE){
            return true;
        }else{
            return false;
        }
    }
    public function alteraNome($nome){
        $id = "SELECT `id_cientista` from `cientista` where `nom_cientista` = '".$nome."';";
        $sql = $this->mysqli->prepare("UPDATE `cientista` SET `nom_cientista` = '".$nome."' WHERE `id_cientista` = '".$id."';");
        $sql->execute();
    }
    public function setAreaForm($area){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("INSERT INTO `formacao` (`fk_id_cientista`, `fk_id_titulacao`) VALUES ('".$id."', '".$area."';");
        $sql->execute();
    }
    public function excluirAreaForm($formacao){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("DELETE FROM `formacao` WHERE `fk_id_cientista` = '".$id."' AND `fk_id_titulacao` = '".$formacao."';");
        $sql->execute();
    }
    public function getAreaForm(){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `id_cientista` = '".$cpf."';";
        $result = $this->mysqli->query("SELECT * FROM `formacao` WHERE `fk_id_cientista` = '".$id."';");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
    public function setAreaAtuacao($area){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("INSERT INTO `area_atuacao_cientista` (`fk_id_cientista`, `fk_id_area_atuacao`) VALUES ('".$id."', '".$area."';");
        $sql->execute();
    }
    public function excluirAreaAtuacao(){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("DELETE FROM `area_atuacao_cientista` WHERE `fk_id_cientista` = '".$id."';");
        $sql->execute();
    }
    public function getAreaAtuacao(){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `id_cientista` = '".$cpf."';";
        $result = $this->mysqli->query("SELECT * FROM `area_atuacao_cientista` WHERE `fk_id_cientista` = '".$id."';");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
    public function setRedeSocial($rede){
        $cpf = $_SESSION['cpf'];
        $nomeRede = $_SESSION['nomeRede'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("INSERT INTO `redes_sociais` VALUES ('', '".$nomeRede."', '', '".$id."';");
        $sql->execute();
    }
    public function excluirRedeSocial($rede){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `id_cientista` from `cientista` where `cpf_cientista` = '".$cpf."';";
        $sql = $this->mysqli->prepare("DELETE FROM `redes_sociais` WHERE `fk_id_cientista` = '".$id."';");
        $sql->execute();
    }
    public function getRedeSocial(){
        $cpf = $_SESSION['cpf'];
        $id = "SELECT `end_rede_social` from `redes_sociais` where `fk_id_cientista` = '".$cpf."';";
        $result = $this->mysqli->query("SELECT * FROM `redes_sociais` WHERE `fk_id_cientista` = '".$id."';");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
}
?>
