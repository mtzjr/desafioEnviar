<?php
require_once("../model/cientista.php");
class cadastroController{

    private $cientista;

    public function __construct(){
        $this->cientista = new Cientista();
        $this->incluir();
    }

    private function incluir(){
        $this->cientista->setNome($_POST['nome']);  
        $this->cientista->setCpf($_POST['cpf']);
        $this->cientista->setDtNasc(date('Y-m-d',strtotime($_POST['dtNasc'])));
        $this->cientista->setEmail($_POST['email']);
        $this->cientista->setEmailAlt($_POST['emailAlt']);
        $this->cientista->setLattes($_POST['lattes']);
        $this->cientista->setSnh($_POST['snh']);
        $this->cientista->setSenha(md5($_POST['senha']));
        $result = $this->cientista->incluir();
        if($result >= 1){   
            echo "<script>alert('Cadastro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar');history.back()</script>";
        }
    }
}
new cadastroController();
?>
