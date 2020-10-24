<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/admin/dash/style.css">
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
                <a href="<?=url("admin/insert-user")?>" class="header__alterar">Adicionar usuário</a>
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

          
       
    <table class="container" id="tabela">
        <thead>
            <tr class="container__tr">
                <th class="container__th"><h2 class="container__secondary">ID</h2></th>
                <th class="container__th"><h2 class="container__secondary">Usuário</h2></th>
                <th class="container__th"><h2 class="container__secondary">Editar</h2></th>
                <th class="container__th"><h2 class="container__secondary">Apagar</h2></th>
            </tr>
        </thead>

        <tbody>
            <?php if($users): 
                foreach ($users as $user):
            ?>
                <tr class="container__tr">
                    <td class="container__td"><?= $user['id'] ?></td>
                    <td class="container__td"><?= $user['usuario']; ?></td>
                    <td class="container__td"><a href="#" class="edition center"></a></td>
                    <td class="container__td"><a href="#popup" class="delete center"></a></td>
                </tr>
            <?php
                endforeach;
                else:
            ?>
                <h2>Sem dados</h2>
            <?php
            endif; ?>
        </tbody>

    </table>

    <div class="popup" id="popup">
        <div class="popup__container">
            
            <div class="popup__group">
                <p class="popup__paragh">Deseja apagar?</p>
                <div class="popup__group--link">
                    <form action="">
                        <button class="popup__confirm"></button>
                    </form>
                    <a class="delete" href="#tabela"></a>
                </div>
            </div>
        </div>
    </div>
          
</body>
</html>