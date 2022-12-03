<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/telaperfil.css"> 
    <title>Tela de Perfil</title>
</head>
<body>
<?php
    include ('./header.php');
  ?>

    <main>
        <h1>Perfil cientista</h1>

        <article>
            <button class="editar">Editar Perfil</button>
            <section class="perfil">
                <input type="text" name="nomeCientista" placeholder="Nome completo do cientista" class="input">     
                <p class="area">Área(s) de formação:</p>
                <p class="area">Área(s) de atuação:</p>

                <figure>
                    <a href="">
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" alt="">
                    </a>

                    <a href="">
                        <img src="https://www.brunopalmahidroponia.com.br/wp-content/uploads/2022/08/tiktok-logo-1F4A5DCD45-seeklogo.com_.png" alt="">
                    </a>

                    <a href="">
                        <img src="https://i0.wp.com/www.multarte.com.br/wp-content/uploads/2019/03/logo-instagram-png-fundo-transparente2.png?resize=696%2C696&ssl=1" alt="">
                    </a>

                    <a href="">
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" alt="">
                    </a>

                    <a href="">
                        <img src="https://www.brunopalmahidroponia.com.br/wp-content/uploads/2022/08/tiktok-logo-1F4A5DCD45-seeklogo.com_.png" alt="">
                    </a>

                    <a href="">
                        <img src="https://i0.wp.com/www.multarte.com.br/wp-content/uploads/2019/03/logo-instagram-png-fundo-transparente2.png?resize=696%2C696&ssl=1" alt="">
                    </a>
                </figure>
            </section>

            <div>
                <button class="salvarP">Salvar alterações</button>
            </div>
        </article>

        <article class="projetoP">
            <section class="projeto">
                <form method="post" action="../controller/ControllerProjeto.php">
                    <h2>Projeto</h2>
                    <p>Título do Projeto</p>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo teste de um projeto nervoso">
                    
                    <p>Data de início do projeto</p>
                    <input type="date" id="dtInicio" name="dtInicio">
                    
                    <p>Data de término do projeto</p>
                    <input type="date" id="dtFim" name="dtFim">
                    
                    <p>Resumo do projeto</p>
                    <input class="resumo" id="resumo" name="resumo" type="text" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s">
                    
                    <p>Visibilidade</p>
                    <input type="checkbox" id="visibilidade" name="visibilidade">
                    <label for="">Público</label>
                    <br>
                    <div>
                        <input type="submit" value="Cadastrar" class="salvar"/> 
                        <button type="submit" class="salvar">Salvar</button>
                        <button type="submit" class="excluir">Excluir projeto</button>
                    </div>
                </form>
            </section>
        </article>
    </main>

    <footer>
    </footer>
</body>
</html> 