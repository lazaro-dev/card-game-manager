<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/dash/style.css">
</head>
<body>
    <div>
    <header>
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
    <?php  
        if (isset($jogos)&&!empty($jogos)):
    ?>
        <section class="section__select">
            <form action="" method="POST">                 
                <div class="form__center">                           
                    <select class="form__select" name="id_jogo" id="jogo">
                        <?php 
                            foreach ($jogos as $jogo):
                        ?>
                            <option value="<?= $jogo['jogo_id']?>"><?= $jogo['tipo_jogo_valor'] ?></option>
                        <?php  
                            endforeach;
                        ?>
                    </select>                             
                </div>

                <button type="submit" class="select__btn">Avançar</button>
            </form>
        </section>
    <?php  
        endif;
    ?>

    <?php  
        if (isset($coluna['tipo_jogo_campo'])&&!empty($coluna['tipo_jogo_campo'])):
    ?>
        <table class="container" id="tabela">
            <caption class="container__caption"><?= $coluna['tipo_jogo_campo']?>: &nbsp;<span><?= $coluna['tipo_jogo_valor'] ?></span></caption>
            <thead>
                <tr class="container__tr">
                    <th class="container__th"><h2 class="container__secondary"><?= $coluna['nome_jogo_carta_campo'] ?></h2></th>
                    <th class="container__th"><h2 class="container__secondary"><?= $coluna['nome_carta_campo']  ?></h2></th>
                    
                    <?php  
                        if (isset($coluna['tipos_col'])&&!empty($coluna['tipos_col'])):
                            foreach ($coluna['tipos_col'] as $col):                        
                    ?>

                        <th class="container__th"><h2 class="container__secondary"><?= $col['descricao_modo'] ?></h2></th>
                    
                    <?php                       
                            endforeach;
                        endif;
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php  
                    if (isset($cartas)&&!empty($cartas)&&$cartas!=null):                        
                ?>
                    <?php  
                        foreach ($cartas as $carta):
                    ?>
                    <tr class="container__tr">                       

                        <td class="container__td red"><?= $carta['nome_jogo_carta_valor'] ?></td>                     
                        <td class="container__td red"><?= $carta['nome_valor'] ?></td>   
                        <?php                      
                            foreach ($carta['tipos_jogos'] as $tip): 
                        ?>        
                            <td class="container__td"><?= $tip['string_camp']?></td>   
                        <?php

                            endforeach;
                        ?>
                        <td class="container__td">
                            <div class="container__group">
                                <a class="container__alterar" href="<?= url("usuario")."/update-card-1/{$carta['id_carta']}"?>"></a>
                                <a class="container__deletar" href="#popup<?= $carta['id_carta'] ?>"></a>
                            </div>
                        </td>
                    
                        <div class="popup" id="popup<?= $carta['id_carta'] ?>">
                            <div class="popup__container">                        
                                <div class="popup__group">
                                    <p class="popup__paragh">Deseja apagar?</p>
                                    <div class="popup__group--link">
                                    <form action="<?= url("usuario")."/delete-card"?>" method="POST">                           
                                        <input hidden type="text" name="_method" value="DELETE"/>
                                        <input hidden type="text" name="id_carta" value="<?= $carta['id_carta']?>"/> 
                                        <button type="submit" class="popup__confirm"></button>
                                    </form>
                                        <!-- <a class="popup__confirm" href="<?= url("usuario")."/delete-card/{$carta['id_carta']}"?>"></a> -->
                                        <a class="container__deletar" href="#tabela"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr> 
                    <?php
                        endforeach;
                    ?>
                <?php  
                    endif;    
                ?>
            </tbody>
        </table>
    <?php  
        else:                      
    ?>
        <h1>Cadastre um jogo</h1>
    <?php  
        endif;
    ?>
    </div>    
</body>
</html>