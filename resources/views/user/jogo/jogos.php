<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens</title>
    <link rel="shortcut icon" type="image/png" href="<?=url()?>/resources/assets/img/icon.jpg">
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/jogo/style.css">
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
        else:
    ?>
        <h1>Sem jogos cadastrados!</h1>
     <?php  
        endif;
    ?>
    <div class="come__div">
        <a href="<?= url("usuario")?> " class="come__back">Voltar</a>
    </div>
</body>
</html>