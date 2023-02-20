<main class="Home_site">
    <div class="main_container">
        <div class="main_titulo">
            <h1>TENHA O CONTROLE DA SUA VIDA!</h1>
            <p>Com nosso sistema, você pode gerenciar melhor o seu dia a dia e ter uma vida mais organizada!</p>
            <p>Fique à vontade para criar uma conta, ou realizar o login para usar</p>
        </div>

        <div class="main_forms">


            <div class="main_form_cadastro">

                <div class="main_form_cadastro_titulo">
                    <h1>NÃO PERCA MAIS TEMPO!</h1>
                    <p>Começe agora a organizar a sua vida de graça!</p>
                </div>

                <div class="form_cadastro">
                    <form method="POST" action="/cadastro">
                        <input type="text" name="nomeCadastro" placeholder="Seu nome completo">
                        <input type="email" name="emailCadastro" placeholder="O seu melhor email">
                        <input type="password" name="senhaCadastro" placeholder="Uma senha bem forte">
                        <input type="submit" name="cadastrar" value="Cadastrar!">
                    </form>
                    <span>
                        <?php
                        if (isset($_SESSION['erroCadastro'])) {
                            echo $_SESSION['erroCadastro'];
                            unset($_SESSION['erroCadastro']);
                        }
                        ?>
                    </span>
                </div>

            </div>


            <div class="main_form_login">

                <div class="main_form_login_titulo">
                    <h1>ACESSE SUA CONTA!</h1>
                    <p>Realize o login para acessar o app!</p>
                </div>

                <div class="form_login">
                    <form method="POST" action="/login">
                        <input type="email" name="emailLogin" placeholder="Email">
                        <input type="password" name="senhaLogin" placeholder="Senha">
                        <input type="submit" name="logar" value="Acessar a conta">
                    </form>
                    <span>
                        <?php
                        if (isset($_SESSION['erroLogin'])) {
                            echo $_SESSION['erroLogin'];
                            unset($_SESSION['erroLogin']);
                        }
                        ?>
                    </span>
                </div>
            </div>

        </div>




    </div>
</main>