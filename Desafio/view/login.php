<?php	
	require_once('../controller/ControllerLogin.php');
	$objLogin = new Login();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="./css/login.css">
  <title>Login</title>
</head>
<body>
    <?php
    include ('./header.php');
  ?>
    <main>
        <section>
            <div class="content">      
                <div id="login">
                    <form method="POST" action="../controller/ControllerLogin.php"> 
                        <h1>Login</h1> 
                        <p> 
                        <label for="cpf">Seu CPF</label>
                        <input id="cpf" name="cpf" required="required" type="text" placeholder="12345698799"/>
                        </p>

                        <p> 
                        <label for="senha">Sua senha</label>
                        <input id="senha" name="senha" required="required" type="password" placeholder="1234" /> 
                        </p>

                        <p> 
                        <input  type="submit" value="Enviar" name="Enviar" /> 
                        </p>

                        <p class="link">
                        Ainda não tem conta?
                        <a href="../view/cadastro.php">Cadastre-se</a>
                        </p>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_POST["Enviar"]) && $_POST["Enviar"] == "Enviar"){
                    $logar = $objLogin->Logar($_POST["cpf"],$_POST['senha']);
                }
            ?>
            <br/>
            <?php 
                if (isset($logar)){
            ?>
            <div class="container-erro">
                <?php echo $logar ?>
            </div>
            <?php 
            } 
            ?>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>