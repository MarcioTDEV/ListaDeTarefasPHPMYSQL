<main class="Home_usuario">
    <div class="grid_home">

        <div class="home_adicionarTarefa">
            <div class="adicionarTarefa_titulo">
                <h1>ADICIONAR TAREFA</h1>
                <p>O que você vai fazer hoje?</p>
            </div>
            <div class="adicionarTarefa_form">
                <form method="POST" action="/adicionarTarefa">
                    <input class="input_AdicionarTarefa" type="text" name="textoTarefa" placeholder="Digite a tarefa">
                    <input class="submit_AdicionarTarefa" type="submit" name="adicionar" value="Adicionar" />
                </form>
                <span>
                    <?php
                    if (isset($_SESSION['erroAddTarefa'])) {
                        echo $_SESSION['erroAddTarefa'];
                        unset($_SESSION['erroAddTarefa']);
                    }

                    ?>
                </span>
            </div>
        </div>

        <div class="home_TarefasDoDia">

            <div class="TarefasDoDia_Conteudo">
                <ul class="lista_tarefas">
                    <?php
                    // caso haja tarefas, o array vai lista-las abaixo
                    if (count($items) > 0) {


                        foreach ($items as $key => $value) { ?>

                            <li class="<?php
                                        if ($value['statusTarefa'] === 'pendente') {
                                            echo 'pendente';
                                        } else {
                                            echo "concluida";
                                        }
                                        ?>">

                                <!-- texto da tarefa -->
                                <div class="box_textoTarefa">
                                    <span class="textoTarefa"> <?= $value['textoTarefa'] ?></span>
                                </div>
                                <!-- status atual -->
                                
                                
                                
                                <div class="box_Tarefas">
                                    <span class="statusTarefa_display"> <?= $value['statusTarefa'] ?> </span>

                                <?php
                                // se o status atual for pendente, a ação será para 
                                // alterar o status para concluida
                                if ($value['statusTarefa'] == 'pendente') { ?>

                                    <form method="post" action="/mudarStatus" class="statusTarefa">
                                        <input type="hidden" name="statusTarefa" value="concluida" />
                                        <input type="hidden" name="idTarefa" value="<?= $value['idTarefa'] ?>" />
                                        <input type="submit" name="concluir" value="Concluir" />
                                    </form>


                                <?php } else { ?>

                                    <form method="post" action="/mudarStatus" class="statusTarefa">
                                        <input type="hidden" name="statusTarefa" value="pendente" />
                                        <input type="hidden" name="idTarefa" value="<?= $value['idTarefa'] ?>" />
                                        <input type="submit" name="pendente" value="Pendente" />
                                    </form>


                                <?php  }
                                ?>
                                <!-- deletar tarefa -->
                                <form method="post" action="/deletar">
                                    <input type="hidden" name="idTarefa" value="<?= $value['idTarefa'] ?>" />
                                    <input type="submit" name="Deletar" value="Deletar Tarefa" />
                                </form>
                                </div>
                            </li>


                    <?php }
                    } else {
                        echo "<h2>Adicione sua primeira tarefa</h2><p>Quando a tarfa for inserida, você poderá realizar as ações dela</p>";
                    }


                    ?>
                </ul>
            </div>





        </div>



    </div>

</main>