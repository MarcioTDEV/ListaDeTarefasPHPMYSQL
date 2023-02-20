<?php
// A classe DAO vai receber as variáveis da classe model para realizar manipulações no db(crud)
// e retornar o resultado das mesmas

namespace DAO;
require "./autoload.php";
use Model;
use Model\UserModel;

class UserDao{
    private \PDO $pdo;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=listaDeTarefas";
        $this->pdo = new \PDO($dsn, "root","");
    }

    //função vai deletar todas as tarefas do usuário e, em seguida, deletar o próprio
    public function deletarConta (Model\UserModel $model){
        $stmt = $this->pdo->prepare("delete from Tarefas where idUsuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $model->id);
        $stmt->execute();
        $stmt = $this->pdo->prepare("delete from Usuario where idUsuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $model->id);
        $stmt->execute();
    }

    // função vai verificar se existe um email cadastrado no sistema e retornar
    // falso ou um array com os dados do email
    public function buscarUsuarioPeloEmail(Model\UserModel $model){
        $stmt = $this->pdo->prepare("select * from Usuario where emailUsuario = :email");
        $stmt->bindParam(":email", $model->email);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //cadastrar usuario
    public function criarUsuario(Model\UserModel $model){
        $stmt = $this->pdo->prepare("insert into Usuario values (default, :nome, :email, :senha)");
        $stmt->bindParam(":nome", $model->nome);
        $stmt->bindParam(":email", $model->email);
        $criptografia = password_hash($model->senha, PASSWORD_DEFAULT);
        $stmt->bindParam(":senha", $criptografia);
        $stmt->execute();
    }
}