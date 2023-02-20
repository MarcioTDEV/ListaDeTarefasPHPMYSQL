<?php
// buscar tudo de Tarefas onde date = :data()

namespace DAO;

require "./autoload.php";
use Model;

class TarefasDAO{

    private \PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=listaDeTarefas";
        $this->pdo = new \PDO($dsn,"root","");
    }


    public function deletarTarefa(Model\TarefasModel $model){
        $stmt = $this->pdo->prepare("delete from Tarefas where idTarefa = :idTarefas");
        $stmt->bindParam(":idTarefas", $model->idTarefa);
        $stmt->execute();
    }

    public function  mudarStatusTarefa(Model\TarefasModel $model){
        $stmt = $this->pdo->prepare("update tarefas set statusTarefa = :statusTarefa where idTarefa = :idTarefa limit 1");
        $stmt->bindParam(":statusTarefa", $model->status);
        $stmt->bindParam(":idTarefa", $model->idTarefa);
        $stmt->execute();
    }

    public function buscarTarefasUsuario(Model\TarefasModel $model){
        $stmt = $this->pdo->prepare("select * from Tarefas where idUsuario = :idUsuario order by idTarefa");
        $stmt->bindParam(":idUsuario", $model->idUsuario);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserirDados(Model\TarefasModel $model){
        $stmt = $this->pdo->prepare("insert into Tarefas values (default, :texto, :status, :idUsuario)");
        $stmt->bindParam(":texto", $model->textoTarefa);
        $stmt->bindParam(":status", $model->status);
        $stmt->bindParam(":idUsuario", $model->idUsuario);
        $stmt->execute();
    }

    
}