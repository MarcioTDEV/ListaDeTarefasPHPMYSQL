<?php

namespace Control;
require "./autoload.php";
use Model;


class TarefasControl{

    //deletar Conta
    public static function deletarComta(){

    }

    //deletar tarefa 
    public static function deletarTarefa (){
        $model = new Model\TarefasModel();
        $model->idTarefa = $_POST['idTarefa'];
        $model->deletarTarefa();
        header("Location: /home");
    }

    //mudar status da tarefa selecionada
    public static function mudarStatusTarefa (){
        $model = new Model\TarefasModel();
        $model->status = $_POST['statusTarefa'];
        $model->idTarefa = $_POST['idTarefa'];
        $model->mudarStatusTarefa();
        header("Location: /home");
    }

    public static function inserirTarefa(){
        //verificar se os campos estão preenchidos
        if(empty($_POST['textoTarefa'])){
            $_SESSION['erroAddTarefa'] = "O campo não pode ficar vazio";
            header("Location: /home");
            return;
        }

        //instanciar a tarefas model
        $model = new Model\TarefasModel();
        $model->textoTarefa = $_POST['textoTarefa'];
        $model->status = "pendente";
        
        $model->idUsuario = $_SESSION['user']['idUsuario'];
        $model->inserirDados();
        header("Location: /home");
        
    }

}