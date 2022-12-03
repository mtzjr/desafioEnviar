<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cadastro.css"> 
    <title>Cadastro</title>
</head>
<body>
<?php
    include ('./header.php');
  ?>
<div class="container" >
    <div class="content">      
      <div id="cadastro">
        <form method="post" action="../controller/ControllerCadastro.php" id="form" name="form"> 
          <h1>Cadastro</h1> 
          
          <p> 
            <label for="nome">Seu nome</label>
            <input id="nome" name="nome" required="required" type="text" placeholder="Luiz Augusto" />
          </p>

          <p> 
            <label for="cpf">CPF</label>
            <input id="cpf" name="cpf" required="required" type="number" placeholder=""/> 
          </p>

          <p> 
            <label for="senha">Senha</label>
            <input id="senha" name="senha" required="required" type="passaword" placeholder=""/> 
          </p>
          
          <p> 
            <label for="dtNasc">Data nascimento</label>
            <input id="dtNasc" name="dtNasc" required="required" type="date" placeholder=""/> 
          </p>
          
          <p> 
            <label for="email">Seu e-mail</label>
            <input id="email" name="email" required="required" type="e-mail" placeholder="contato@htmlecsspro.com"/> 
          </p>

          <p> 
            <label for="emailAlt">Seu e-mail</label>
            <input id="emailAlt" name="emailAlt" required="required" type="e-mail" placeholder="contato@htmlecsspro.com"/> 
          </p>

          <p> 
            <label for="lattes">Lattes</label>
            <input id="lattes" name="lattes" required="required" type="text" placeholder=""/> 
          </p>

          <p> 
            <label for="snh">Snh</label>
            <input id="snh" name="snh" required="required" type="number" placeholder=""/> 
          </p>
          
          <p> 
            <input type="submit" value="Cadastrar"/> 
          </p>
          
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div> 
</body>
</html>