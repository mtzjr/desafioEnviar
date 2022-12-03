<?php
require_once("../model/banco.php");

class Login{

    function __construct(){
        $objConnection = new Banco();
     }

	function Logar($cpf,$senha){
        try{
            if(isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['senha']) && !empty($_POST['senha'])){
                $q_usuario = mysql_query("select * from cientista where cientista.permissaoAdm ='1'");	
                if(mysql_num_rows($q_usuario) == 1){
                    $d_usuario = mysql_fetch_array($q_usuario);
                    if($d_usuario["permissaoAdm"] == '1'){
                        header("Location: dirname(__FILE__)../view/adm.php");
                    }else{
                        $q_usuario = mysql_query("select * from cientista where cientista.cpf_cientista ='".$cpf."'");	
                        if(mysql_num_rows($q_usuario) == 1){
                            $d_usuario = mysql_fetch_array($q_usuario);
                            if($d_usuario["senha_cientista"] == $senha){
                                $_SESSION["cpf"] = $d_usuario["cpf_cientista"];
                                $_SESSION["senha"] = $d_usuario["senha_cientista"];
                                $_SESSION["logado"] = "sim";
                                $_COOKIE['cpf_cientista'] = $_POST['cpf'];
                                $_COOKIE['senha_cientista'] = $_POST['senha'];
                                header("Location: dirname(__FILE__)../view/perfil.php");
                            }else{
                                unset ($_SESSION['cpf']);
                                unset ($_SESSION['senha']);
                                header('location: index.php');
                            }
                        }
                    }
                }else{
                    return "<script language='javascript' type='text/javascript'>alert('Login ou Senha inválido!')</script>";
                };
            }
        }catch(exception $e){
            echo "Houve um erro ao realizar login: Erro ".$e.".";
        } finally{
            header("Location: index.php");
        }		
	}
	
	function getIdUsuario(){
		return $_SESSION["id_cientista"];
	}
	
	function deslogar(){
		session_destroy();
		header("Location: dirname(__FILE__)../view/login.php");
	}
}


?>