<?php
// A classe UserModel vai usar a classe DAO para buscar os dados no banco 
// e realizar suas devidas validações
// Vari realizar as buscas relacionadas ao login, cadastro e busca


namespace Model;

require "./autoload.php";

use DAO;

class UserModel
{
    public string $id;
    public string $nome;
    public string $email;
    public string $senha;

    public $dados;

    public function deletarConta (){
        $dao = new DAO\UserDao();
        $dao->deletarConta($this);
    }

    public function validarLoginUsuario(){
        $dao = new DAO\UserDao();
        $buscaUsuario = $dao->buscarUsuarioPeloEmail($this);

        if($buscaUsuario === false){
            return false;
        }
        $this->dados = $buscaUsuario;
    }


    //a função vai validar se o email já existe através da dao e retornar falso caso exista
    public function ValidarCadastroUsuario()
    {
        $dao = new DAO\UserDao();

        //verificar existência de email;
        $resultado = $dao->buscarUsuarioPeloEmail($this);
        
        // a função também vai servir para retornar os dados do usuario,
        // por isso, os dados retornados pela função da DAO vão para a variável
        //dados da model, para que possam ser usados 
        $this->dados = $resultado;

        //se o email já existir, fim da função. caso não exista, a função continua
        if (!$resultado === false) return true;

    }

    //inserir os dados no banco e retornar um array com os dados para sessão.
    //a instancia da classe vai ser feita na control, recebendo as variáveis POST
    public function CadastrarUsuario(){
        $dao = new DAO\UserDao();
        $dao->criarUsuario($this);


    }

}
