<?php

require "autoload.php";

// variável isola a uri e o switch vai chamar uma função de acordo com a mesma

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
        Control\Control::index();
        break;

    case '/cadastro':
        Control\UserControl::cadastrarUsuario();
        break;


        // a rota vai chamar a home e fazer a pesquisa do DAO para
        // retornar a lista de tarefas do usuário
    case "/home":
        Control\Control::HomeUsuario();
        break;

    case "/login":
        Control\UserControl::logarUsuario();
        break;

    case "/sair":
        Control\UserControl::encerrarSessao();
        break;


        //ROTAS DE USO DA HOME DO USUARIO

    case "/adicionarTarefa":
        Control\TarefasControl::inserirTarefa();
        break;
        
    case "/mudarStatus":
        Control\TarefasControl::mudarStatusTarefa();
        break;
        
    case "/deletar":
        Control\TarefasControl::deletarTarefa();
        break;
        
    case "/deletarConta":
        Control\UserControl::deletarConta();
        break;

    default:
        Control\Control::PaginaNaoEncontrada();
        break;
}
