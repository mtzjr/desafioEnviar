<?php
require_once("../model/projeto.php");
class projetoController{
    public function __construct(){
    }

    public function incluirProjeto(){
        $this->projeto->setTitulo($_POST['titulo']);  
        $this->projeto->setDtInico($_POST['dtInicio']);
        $this->projeto->setDtFim($_POST['dtFim']);
        $this->projeto->setResumo($_POST['resumo']);
        $this->projeto->setVisibilidade($_POST['visibilidade']);
        $result = $this->projeto->incluirProjeto();
        if($result >= 1){   
            echo "<script>alert('Projeto incluído com sucesso!');document.location='../view/perfil.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar projeto');history.back()</script>";
        }
    }
    public function excluirProjeto(){
        $adm = new Projeto();
        $adm->deleteProjeto();
    }
    public function editarProjeto(){
        $this->projeto->setTitulo($_POST['titulo']);  
        $this->projeto->setDtInico($_POST['dtInicio']);
        $this->projeto->setDtFim($_POST['dtFim']);
        $this->projeto->setResumo($_POST['resumo']);
        $this->projeto->setVisibilidade($_POST['visibilidade']);
        $result = $this->projeto->incluirProjeto();
        if($result >= 1){   
            echo "<script>alert('Projeto editado com sucesso!');document.location='../view/perfil.php'</script>";
        }else{
            echo "<script>alert('Erro ao editar projeto');history.back()</script>";
        }
    }
}
new projetoController();
?>
