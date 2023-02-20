<?php
// Esse é o controlador principal da página
// Vai trazer a home com a opção de login e cadastro do usuário,


namespace Control;
require "./autoload.php";
use Model;

class Control{
    
    //primeira função executada. vai exibir a página inicial
    public static function index (){
        if(isset($_SESSION['user'])){
            header("Location: /home");
        }
        require "View/Home.php";
        
    }

    // vai validar a home do usuário, se existe a variavel de sessão
    // chamando TarefasDAO, vai buscar os dados da tabela
    public static function HomeUsuario(){
        if(!isset($_SESSION['user'])){
            header("Location: /");
        }

        
        $model = new Model\TarefasModel();
        $model->idUsuario = $_SESSION['user']['idUsuario'];
        $model->buscarTarefasUsuario();
        $items = $model->dados;
        require "View/User/Header.php";
        require "View/User/Home.php";
    }


    public static function PaginaNaoEncontrada(){
        require "View/NotFound.php";
    }
}