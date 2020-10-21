<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/card/modos/style.css">
</head>
<body>  
    <header class="header">
        <a href="../TabelaApresentação/index.html">
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
    
    <section class="section__form">
        <h2 class="form__secondary">Tradicional</h2>
        <form action="" method="POST">
            <div class="form__container">
                <?php  
                    foreach ($items['items_campo'] as $item):
                ?>
                    <!-- Groupo radio -->
                    <div class="form__radio--group">
                        <p class="form__paragh"><?= $item['descricao'] ?></p>
                        
                    <?php  
                        foreach ($item['valor'] as $valor):
                    ?>                    
                        <div class="form__box">
                            <label for="<?= $valor['id_atributo_item'] ?>" class="form__label"><?= $valor['descricao'] ?></label>
                            <input type="radio" name="<?= $item['modo_item_carta_id'] ?>" id="<?= $valor['id_atributo_item'] ?>" value="<?= $valor['id_atributo_item'] ?>" class="form__input" <?php if($valor['checked']=="true"){ echo "checked"; } ?>>
                        </div>
                    <?php
                        endforeach;
                    ?>
                        <!-- <div class="form__box">
                            <label for="ftipo" class="form__label">Tipo de Jogo</label>
                            <input type="radio" name="qdc" id="ftipo" class="form__input" checked>
                        </div> -->
                    </div>
                    <!-- FIM -->
                <?php  
                    endforeach;
                ?>
            <button type="submit" class="form__btn">Alterar</button>
        </form>
    </section>
</body>
</html>