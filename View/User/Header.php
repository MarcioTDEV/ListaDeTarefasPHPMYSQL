<header class="Header_usuario">
    <div class="cabecalho">
        <h1>Seja bem vindo(a), <?= $_SESSION['user']['nomeUsuario'] ?>!</h1>
        <p><a href="/sair">Encerrar Sessão</a></p>
        <p class="deletarConta" id="modalHeader">Deletar Conta</p>
    </div>
</header>

<div class="modalDeletarConta">
    
<div class="msgDeletarConta">
    <h3>Tem certeza que deseja deletar sua conta?</h3>
</div>
<div class="opcoesDeletarConta">
    <button><a href='/deletarConta'>Sim</a></button>
    <button class="botaoFecharModal">Não</button>
</div>
<div class="botaoFechar">
    <p>x</p>
</div>

</div>