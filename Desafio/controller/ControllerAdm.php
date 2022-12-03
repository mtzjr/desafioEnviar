<?php
include ('./ControllerCientista.php');
include ('../model/banco.php');
include ('./ControllerListarCientistas.php');

class Adm extends Usuario {
    public static function listarUsuarios(){
        $listar = new listarCientistasController('todos');
    }
    public static function listarUsuarioEspecifico($nome){
        $listar = new listarCientistasController('especifico');
    }
    public static function excluirUsuario($nome){
        $deleta = new Banco();
        if($deleta->deleteCientista($nome) == TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/deleta.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}

$adm = new Adm;

