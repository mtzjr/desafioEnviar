<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/adm.css"> 
    <title>Administrador</title>
</head>
<body>
    <?php
        include ('../controller/ControllerAdm.php');
        include ('../controller/ControllerDeleta.php');
        include ('../controller/ControllerListarCientistas.php');
        if(isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['senha']) && !empty($_POST['senha'])){
            $q_usuario = mysql_query("select * from cientista where cientista.permissaoAdm ='1'");	
            if(mysql_num_rows($q_usuario) == 1){
                $d_usuario = mysql_fetch_array($q_usuario);
                if($d_usuario["permissaoAdm"] == '1'){
                    header("Location: dirname(__FILE__)../view/adm.php");
                }else{
                    unset ($_SESSION['cpf']);
                    unset ($_SESSION['senha']);
                    header('location: index.php');
                    }
                }
            }
    ?>
    <?php
    include ('./header.php');
    ?>
    <main>
        <h1>Tela de administração</h1>
        <h2 class="btnEditar">Editar perfis</h2>
        <p class="textoP">Selecione a opção</p>

        <article>
            <section>
                <form method="post" action="<?php new listarCientistasController('especifico'); ?>" id="form" name="form">
                    <input type="submit" class="" name="procurar por nome" value="Procurar perfil por nome">
                </form>

                <form method="post" action="<?php $adm->excluirUsuario($_POST['deletar']); ?>" id="form" name="form">
                    <input type="submit" class="" name="deletar" value="Deletar cientista">
                </form>

                <form method="post" action="<?php new listarCientistasController('todos'); ?>" id="form" name="form"> 
                    <input type="submit" name="listar" value="Listar"/> 
                </form>

                <form method="post" action="<?php require_once ('../view/cadastro.php') ?>" id="form" name="form"> 
                    <input type="submit" name="cadastrar novo usuario" value="Cadastrar novo usuario"/> 
                </form>
            </section>
        </article>
    </main>
    <footer>
    </footer>
</body>
</html>