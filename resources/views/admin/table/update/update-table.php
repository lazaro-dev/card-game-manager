<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tabela</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/admin/table/update/style.css">
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
                <a href="<?=url("admin/update-modos")?>" class="header__alterar">Editar Modos</a>
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

<section class="section__form">

        <form action="" method="POST">

            <input hidden type="text" name="_method" value="PUT">
            <div class="form__container">
                <div class="form__box">
                    <label for="ftipo" class="form__label">Titulo da tabela</label>
                    <input type="text" name="tipo_jogo_campo" id="ftipo" class="form__input" placeholder="Titulo da tabela" value="<?= $table['tipo_jogo_campo'] ?>" required>
                </div>

                <div class="form__box">
                    <label for="fcarta" class="form__label">Coluna 1</label>
                    <input type="text" name="nome_jogo_carta_campo" id="fcarta" class="form__input" placeholder="Coluna 1" value="<?= $table['nome_jogo_carta_campo'] ?>" required>
                </div>

                <div class="form__box">
                    <label for="fnome" class="form__label">Coluna 2</label>
                    <input type="text" name="nome_carta_campo" id="fnome" class="form__input" placeholder="Coluna 2" value="<?= $table['nome_carta_campo'] ?>" required>
                </div>
            </div>
            <input type="submit" class="form__btn" value="Alterar">
        </form>
    </section>
    <div class="come__div">
        <a href="<?= url("admin")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>