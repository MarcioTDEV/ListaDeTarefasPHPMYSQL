<?php
// Classe responsável por realizar ações diretamente ligadas a entidade Usuario
// Ações de: criar usuário, iniciar sessão, deletar usuario e encerrar sessão

namespace Control;

require "./autoload.php";

use Model;

class UserControl
{

    public static function deletarConta()
    {
        if (isset($_SESSION['user'])) {
            $model = new Model\UserModel();
            $model->id = $_SESSION['user']['idUsuario'];
            $model->deletarConta();
            unset($_SESSION['user']);
            session_destroy();
            session_start();
            header("Location: /");
        }

        header(("Location:/"));
    }

    public static function  encerrarSessao()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: /");
        }
    }

    //realizar login do usuário e validação
    public static function logarUsuario()
    {
        //validar entradas do usuário(campos vazios)
        if (empty($_POST['emailLogin']) || empty($_POST['senhaLogin'])) {
            $_SESSION['erroLogin'] = "O email e a senha devem ser preenchidos";
            header("Location: /");
            return;
        }


        //instanciar model para chamar as funções
        $model = new Model\UserModel();
        $model->email = $_POST['emailLogin'];
        $model->senha = $_POST['senhaLogin'];
        $buscaUsuario = $model->validarLoginUsuario();

        //validar se há um email cadastrado
        if ($buscaUsuario === false) {
            $_SESSION['erroLogin'] = "O email não foi encontrado";
            header("Location: /");
            return;
        }

        $user = $model->dados;
        //validar a senha cadastrada
        if (!password_verify($_POST['senhaLogin'], $user['senhaUsuario'])) {
            $_SESSION['erroLogin'] = "O email não foi encontrado";
            header("Location: /");
            return;
        }

        //iniciar a sessão e redirecionar para a página
        $_SESSION['user'] = $user;
        header("Location: /home");
        return;
    }


    public static function cadastrarUsuario()
    {
        // validar  entradas do usuario (campos vazios) 
        if (empty($_POST['nomeCadastro']) || empty($_POST['emailCadastro']) || empty($_POST['senhaCadastro'])) {
            $_SESSION['erroCadastro'] = "Todos os campos devem ser preenchidos";
            header("Location: /");
            return;
        }

        //instanciar a model para chamar as funções
        $model = new Model\UserModel();
        $model->nome = $_POST['nomeCadastro'];
        $model->email = $_POST['emailCadastro'];
        $model->senha = $_POST['senhaCadastro'];

        // função da model vai realizar o cadastro direto caso não haja problemas
        $checagem = $model->ValidarCadastroUsuario();


        // validar se já existe email cadastrado. retornar erro caso falso
        if ($checagem === true) {
            $_SESSION['erroCadastro'] = "Já existe uma conta com esse email";
            header("Location: /");
            return;
        }

        // cadastrar usuario
        $model->CadastrarUsuario();

        // renovar a busca do usuário junto com o id
        $model->ValidarCadastroUsuario();

        // iniciar sessão e redirecionar página
        $_SESSION['user'] = $model->dados;

        //O redirecionamento vai para o control para validar se a variável de sessão existe
        header("Location: /home");
    }
}
