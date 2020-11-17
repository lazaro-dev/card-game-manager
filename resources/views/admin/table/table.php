<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/admin/table/style.css">
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
            <caption class="container__caption"><?= $coluna['tipo_jogo_campo']?>: <span><?= $coluna['tipo_jogo_valor'] ?></span></caption>
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
        <h1>Sem dados</h1>
    <?php  
        endif;
    ?>
    </div>    
    <div class="come__div">
        <a href="<?= url("admin")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>