<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/admin/table/items/style.css">
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

<section class="section__select">
        <form action="" method="POST">
        <!-- <?= url("admin")."/update-items"?> -->            
            <div class="form__center">                           
                <select class="form__select" name="id_item" id="item">
                    <?php 
                        foreach ($items as $item):
                    ?>
                        <option value="<?= $item['id']?>"><?= $item['descricao'] ?></option>
                    <?php  
                        endforeach;
                    ?>
                </select>                             
            </div>

            <button type="submit" class="select__btn">Avançar</button>
        </form>
    </section>
    <div class="come__div">
        <a href="<?= url("admin")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>