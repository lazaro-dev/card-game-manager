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
                <a href="<?=url("admin")?>" class="header__alterar">Adicionar usuário</a>
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

       
            <table>
                <thead>
                    <th>ID</th>
                    <th>Usuario</th>
                </thead>
                <tbody>
                <?php if($users): 
                    foreach ($users as $user):
                ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['usuario']; ?></td>
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
       
        
          
</body>
</html>