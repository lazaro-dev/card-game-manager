<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/dash/style.css">
</head>
<body>
    <div>
    <header>
        <header class="header">
            <a href="index.html">
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
                <a href="<?=url("usuario/insert-card-1")?>" class="header__alterar">Adicionar carta</a>
                <a href="<?=url("logout")?>" class="header__login">Logout</a>
            </div>
        </header>        
    </header>
    <?php            
        if (isset($_SESSION['msg'])&&!empty($_SESSION['msg'])) {
            echo "<div class='login__error'>".$_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }
    ?>
    <table class="container" id="tabela">
        <caption class="container__caption"><?= $coluna['tipo_jogo_campo']?>: <span><?= $coluna['tipo_jogo_valor'] ?></span></caption>
        <thead>
            <tr class="container__tr">
                <th class="container__th"><h2 class="container__secondary"><?= $coluna['nome_jogo_carta_campo'] ?></h2></th>
                <th class="container__th"><h2 class="container__secondary"><?= $coluna['nome_carta_campo']  ?></h2></th>

                <?php  
                    foreach ($coluna['tipos_col'] as $col):                        
                ?>

                    <th class="container__th"><h2 class="container__secondary"><?= $col['descricao_modo'] ?></h2></th>
                
                <?php                       
                    endforeach;
                ?>
            </tr>
        </thead>
        <tbody>
            <tr class="container__tr">                       
            <?php  
                foreach ($cartas as $carta):
            ?>

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
                        <a class="container__deletar" href="#popup"></a>
                    </div>
                </td>
            
            <?php
                endforeach;
            ?>
            </tr> 
        </tbody>
    </table>
    <div class="popup" id="popup">
        <div class="popup__container">
            
            <div class="popup__group">
                <p class="popup__paragh">Deseja apagar?</p>
                <div class="popup__group--link">
                    <a class="popup__confirm" href=""></a>
                    <a class="container__deletar" href="#tabela"></a>
                </div>
            </div>
        </div>
    </div>
    </div>    
</body>
</html>