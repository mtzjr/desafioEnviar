<?php 

include ('./InterfaceUsuario.php');
include ('./ControllerCientista.php');
include ('../model/banco.php');
include ('./ControllerListarCientistas.php');

class Usuario extends Iuser {
    public static function adicionarAreaFormacao(){
        $adicionar = new Banco();
        $area = $_POST['areaForm'];
        $adicionar->setAreaForm($area);
    }
    public static function excluirAreaFormacao(){
        $excluir = new Banco();
        $area = $_POST['idAreaForm'];
        $excluir->excluirAreaForm($area);
    }
    public static function adicionarAreaAtuacao(){
        $adicionar = new Banco();
        $area = $_POST['areaAtuacao'];
        $adicionar->setAreaAtuacao($area);
    }
    public static function excluirAreaAtuacao(){
        $excluir = new Banco();
        $area = $_POST['idAreaAtuacao'];
        $excluir->excluirAreaForm($area);
    }
    public static function adicionarRedeSocial(){
        $adicionar = new Banco();
        $rede = $_POST['redeSocial'];
        $adicionar->setRedeSocial($rede);
    }
    public static function excluirRedeSocial(){
        $excluir = new Banco();
        $rede = $_POST['idRede'];
        $excluir->excluirRedeSocial($rede);
    }
    public static function salvarAlteracoes(){
        $altera = new Banco();
        $altera->alteraNome($_POST['nomeCientista']);
    }
    public static function salvarProjeto(){
        $projeto = new projetoController();
        $projeto->incluirProjeto();
    }
    public static function excluirProjeto(){
        $adm = new projetoController();
        $adm->excluirProjeto();
    }
}