<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/login/style.css">
</head>
<body>  
    <header class="header">
        <a href="#">
            <div class="header__container">
                <div class="header__flip1 header__div">
                    <img src="<?=url()?>/resources/assets/img/Card-From.png" width="30" height="50" />
                </div>
                <div class="header__flip2 header__div">
                    <img src="<?=url()?>/resources/assets/img/Card-Back.jpg" width="30" height="50" />
                </div>
             </div>
        </a>

    </header>
    
    <div class="login__content">
           
            <?php            
                if (isset($_SESSION['msg'])&&!empty($_SESSION['msg'])) {
                    echo "<div class='login__error'>".$_SESSION['msg'] . "</div>";
                    unset($_SESSION['msg']);
                }
            ?>
        
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