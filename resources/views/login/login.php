<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/login/style.css">
</head>
<body>  
    <header class="header">
        <a href="../TabelaApresentação/index.html">
            <div class="header__container">
                <div class="header__flip1 header__div">
                    <img src="http://vignette2.wikia.nocookie.net/myyugiohdeck/images/d/da/Dark_Magician.jpg/revision/latest?cb=20110610035254" width="30" height="50" />
                </div>
                <div class="header__flip2 header__div">
                    <img src="http://vignette3.wikia.nocookie.net/yugioh/images/9/94/Back-Anime-2.png/revision/20090601084536" width="30" height="50" />
                </div>
             </div>
        </a>

        <div>
            <a href="../Menu/index.html" class="header__menu"> </a>
            <!-- <a href="../CadastroTabela/index.html" class="header__alterar">Alterar tabela</a>
            <a href="index.html" class="header__login">Login</a> -->
        </div>

    </header>

    <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>

    <div class="login__content">
        <h2 class="login__secondary">Inicie sua sessão</h2>
        <form action="" method="POST">
            <input type="text" name="usuario" id="" class="login__text input" require placeholder="Digite o usuário" value="<?php if (isset($form)) {
                                                                                                            echo $form;
                                                                                                        } ?>">
            <input type="password" name="senha" class="login__password input" placeholder="Senha" require>
            <input type="submit" value="Logar" class="login__submit input">
        </form>
    </div>
</body>
</html>