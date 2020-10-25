<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/card/insert/style.css">
</head>
<body>  
    <header class="header">
        <a href="<?= url("usuario")?>">
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
            <a href="<?=url("usuario")?>" class="header__login">Home</a>
            <a href="<?=url("logout")?>" class="header__login">Logout</a>
        </div>
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
                <!-- <div class="form__box">
                    <label for="ftipo" class="form__label">Tipo de Jogo</label>
                    <input type="text" name="" id="ftipo" class="form__input">
                </div> -->                            
                <div class="form__box">
                    <label for="fnome" class="form__label"><?= $jogos['campos']['tipo_jogo_campo']?></label>
                    <input type="text" name="tipo_jogo_valor" id="fnome" class="form__input" value="<?= $jogos['valor']['tipo_jogo_valor']?>" required>
                </div>             
                <input hidden name="id_jogo" value="<?= $id_jogo?>">
                
            </div>

            <button type="submit" class="form__btn">Salvar</button>
        </form>
    </section>
</body>
</html>