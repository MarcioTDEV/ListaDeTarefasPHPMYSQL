<?php

namespace Model;
require "./autoload.php";
use DAO;

class TarefasModel{
    public string $idTarefa;
    public string $textoTarefa;
    public string $status;
    public string $idUsuario;

    public $dados;

    public function deletarTarefa(){
        $dao = new DAO\TarefasDAO();
        $dao->deletarTarefa($this);
        
    }

    public function mudarStatusTarefa(){
        $dao = new DAO\TarefasDAO();
        $dao->mudarStatusTarefa($this);
    }

    public function inserirDados(){
        $dao = new DAO\TarefasDAO();
        $dao->inserirDados($this);
    }

    public function buscarTarefasUsuario(){
        $dao = new DAO\TarefasDAO();
        $this->dados = $dao->buscarTarefasUsuario($this);
    }
}