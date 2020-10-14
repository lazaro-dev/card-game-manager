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
        <!-- <form action="" method="POST"> -->
            <!-- <div class="form__container">        

                <div class="form__box">
                    <label for="fnome" class="form__label"><?= $campos['carta_nome'][0]['nome_jogo_carta_campo']?></label>
                    <input type="text" name="nome_jogo_carta_valor" id="fnome" class="form__input" required >
                </div>

                <div class="form__box">
                    <label for="fcarta" class="form__label"><?= $campos['carta_nome'][0]['nome_carta_campo'] ?></label>
                    <input type="text" name="nome_valor_carta" id="fcarta" class="form__input" required >
                </div>
                
            </div> -->

                                                
            <div class="form__adjuster">
                <?php  
                    foreach ($modos as $mod):
                ?>
                    <!-- Card -->
                    <div class="form__card">
                        <div class="form__pepctive">
                            <div class="form__card--from form__cards">
                                <ul class="form__list--card">
                                <?php
                                    if($mod['items']!==null):
                                        foreach ($mod['items'] as $atr):
                                ?>
                                    <li class="form__list"><?=$atr['item_desc'] ?>: <span class="form__item"><?= $atr['atr_desc'] ?></span></li>       
                                <?php
                                        endforeach;
                                    endif;
                                ?>
                                </ul>
                            </div>
                            <div class="form__card--back form__cards">
                                <p class="form__paragh"><?=$mod['descricao_modo']?></p>
                                <a href="<?=url("usuario/update-modo").'/'.$id_carta.'/'.$mod['id_modo_jogo']?>" class="form__link">Alterar</a>
                            </div>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
            <!-- <button type="submit" class="form__btn">Salvar</button> -->
        <!-- </form> -->
    </section>
</body>
</html>