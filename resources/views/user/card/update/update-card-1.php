<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carta</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/card/update/style.css">
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
            <a href="<?=url("usuario/insert-jogo")?>" class="header__alterar">Inserir Jogo</a>
            <a href="<?=url("usuario/update-jogos")?>" class="header__alterar">Editar Jogo</a>
            <a href="<?=url("usuario/delete-jogo")?>" class="header__alterar">Delete Jogo</a>
            <a href="<?=url("usuario/insert-card")?>" class="header__alterar">Adicionar carta</a>
            <a href="<?=url("logout")?>" class="header__login">Sair</a>
        </div>
    </header>

    <section class="section__form">
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
        <form action="" method="POST">
            <input hidden type="text" name="_method" value="PUT">
            <div class="form__container">
           
                <div class="form__box">
                    <label class=""></label>
                    <select class="form__input" name="jogo_id" id="jogo">
                        <?php  
                            foreach ($campos['jogos'] as $jogo):
                        ?>
                            <option value="<?= $jogo['jogo_id']?>"><?= $jogo['tipo_jogo_valor']?></option>
                        <?php  
                            endforeach;
                        ?>
                    </select>
                </div>
                
                <div class="form__box">
                    <label for="fnome" class="form__label"><?= $campos['carta_campos']['nome_jogo_carta_campo']?></label>
                    <input type="text" name="nome_jogo_carta_valor" id="fnome" class="form__input" required value="<?php if (isset($campos['card_info'])) {
                                                                                                            echo $campos['card_info']['nome_jogo_carta_valor'];
                                                                                                        } ?>">
                </div>

                <div class="form__box">
                    <label for="fcarta" class="form__label"><?= $campos['carta_campos']['nome_carta_campo'] ?></label>
                    <input type="text" name="nome_valor" id="fcarta" class="form__input" required value="<?php if (isset($campos['card_info'])) {
                                                                                                            echo $campos['card_info']['nome_carta_valor'];
                                                                                                        } ?>">
                </div>                
            </div>
            <button type="submit" class="form__btn">Salvar e avançar</button>
        </form>
    </section>
    <div class="come__div">
        <a href="<?= url("usuario")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>