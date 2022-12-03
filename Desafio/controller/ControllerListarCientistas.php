<?php
require_once("../model/banco.php");
class listarCientistasController{

    private $lista;

    public function __construct($tipoPesquisa){
        if($tipoPesquisa == 'todos'){
            $this->lista = new Banco();
            $this->criarTabela();
        } else if($tipoPesquisa == 'especifico'){
            $this->lista = new Banco();
            $this->procurarCientista($_POST['procurar por nome']);
        }
    }

    private function criarTabela(){
        $row = $this->lista->getCientistas();
        foreach ($row as $value){
            echo "<table>";
            echo "<tr>";
            echo "<td>".$value['nom_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['cpf_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['senha_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['dtn_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['email_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['email_alternativo_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['lattes_cientista'] ."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$value['snh_cientista'] ."</td>";
            echo "</tr>";
            echo "</table>";
            echo "</tr>";
            echo "<br>";
        }
    }
    private function procurarCientista($nome){
        $encontrou = 0;
        $row = $this->lista->getCientistas();
        foreach ($row as $value){
            if($value['nom_cientista'] == $nome){
                echo "<table>";
                echo "<tr>";
                echo "<td>".$value['nom_cientista'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>".$value['cpf_cientista'] ."</td>";
                echo "</tr>";
                echo "</table>";
                echo "</tr>";
                echo "<br>";
                $encontrou = 1;
            }
            if(!$encontrou){
                echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
            }
        }
    }
}
?>