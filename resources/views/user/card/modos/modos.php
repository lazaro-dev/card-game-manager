<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modos</title>    
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/card/modos/style.css">
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
                                    if($mod['items']):
                                        foreach ($mod['items'] as $atr):
                                ?>
                                    <li class="form__list"><?=$atr['item_desc'] ?>: <span class="form__item"><?= $atr['atr_desc'] ?></span></li>       
                                <?php
                                        endforeach;
                                    else:
                                ?>
                                    <div class="form__icon">
                                        <!-- Passe o mouse sobre o card -->
                                    </div>
                                <?php                                
                                    endif;
                                ?>
                                </ul>
                            </div>
                            <div class="form__card--back form__cards">
                                <p class="form__paragh"><?=$mod['descricao_modo']?></p>
                                <?php
                                    if($mod['items']!==null&&!empty($mod['items'])):   
                                ?>
                                    <a href="<?=url("usuario/update-modo").'/'.$id_carta.'/'.$mod['id_modo_jogo']?>" class="form__link">Alterar</a>
                                <?php
                                    else:
                                ?>
                                   <a href="<?=url("usuario/insert-modo").'/'.$id_carta.'/'.$mod['id_modo_jogo']?>" class="form__link">Inserir</a>
                                <?php                                    
                                    endif;
                                ?>
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
    <div class="come__div">
        <a href="<?= url("usuario/update-card-1").'/'.$id_carta?> " class="come__back">Voltar</a>
    </div>
</body>
</html>