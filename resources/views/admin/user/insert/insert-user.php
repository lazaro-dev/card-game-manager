<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/admin/user/insert/style.css">
</head>
<body>
    <div>
    <header>
        <header class="header">
            <a href="<?= url("admin")?>">
                <div class="header__container">
                    <div class="header__flip1 header__div">
                        <img src="<?=url()?>/resources/assets/img/Card-From.png" width="30" height="50" />
                    </div>
                    <div class="header__flip2 header__div">
                        <img src="<?=url()?>/resources/assets/img/Card-Back.jpg" width="30" height="50" />
                    </div>
                </div>
            </a>

            <div>
                <a href="<?=url("admin/update-table")?>" class="header__alterar">Editar tabela</a>
                <a href="<?=url("admin/update-modos")?>" class="header__alterar">Editar Modos</a>
                <a href="<?=url("admin/update-items-atributo")?>" class="header__alterar">Editar Item Atributo</a>
                <a href="<?=url("admin/update-items")?>" class="header__alterar">Editar Itens</a>
                <a href="<?=url("admin/insert-user")?>" class="header__alterar">Adicionar usuário</a>
                <a href="<?=url("admin/update-password")?>" class="header__alterar">Atualizar Senha</a>
                <a href="<?=url("logout")?>" class="header__login">Sair</a>
            </div>
        </header>        
    </header>
    <?php            
        if (isset($_SESSION['msg'])&&!empty($_SESSION['msg'])) {
            echo "<p class='mensagem__error'>".$_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }else{
            unset($_SESSION['msg']);
        }
        if (isset($_SESSION['msgSuc'])&&!empty($_SESSION['msgSuc'])) {
            echo "<p class='mensagem__sucesses'>".$_SESSION['msgSuc'] . "</p>";
            unset($_SESSION['msgSuc']);
        }else{
            unset($_SESSION['msgSuc']);
        }
    ?>
                 
<section class="section__user">        

        <form action="" method="POST">
            <fieldset class="user__fiel">
                <!-- só use esse legend caso seja o formulario de editar o usuario  -->
                <!-- <legend class="user__name">Username</legend> -->
                <div class="user__form">
                    <div class="user__group">
                        <label for="iuser" class="user__label">Usuário</label>
                        <input type="text"  name="usuario" id="iuser"  class="user__input" required>
                    </div>

                    <div class="user__group">
                        <label for="isenha" class="user__label">Senha</label>
                        <input type="password" name="senha" id="isenha" class="user__input" required>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn">Criar</button>
        </form>
    </section>
    <div class="come__div">
        <a href="<?= url("admin")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>