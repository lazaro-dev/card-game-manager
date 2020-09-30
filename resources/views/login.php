
<div>
    <form class="" method="POST" action="">
            
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div class="">
            <label>Usuário</label>
            <input name="usuario" type="text" class="" placeholder="Digite o usuário" require value="<?php if (isset($form)) {
                                                                                                            echo $form;
                                                                                                        } ?>">
        </div>
        <div class="">
            <label>Senha</label>
            <input name="senha" type="password" class="" placeholder="Digite a senha" require>
        </div>
        <button>Entrar</button>
    </form>
</div>