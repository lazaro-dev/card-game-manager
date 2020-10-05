<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
</head>
<body>
    <div>
    <header>
        <h1><?= $coluna['tipo_jogo_campo']?> : <?= $coluna['tipo_jogo_valor'] ?></h1>
    </header>
    <table>
        <tr>
            <th><?= $coluna['nome_jogo_carta_campo'] ?></th>
            <th><?= $coluna['nome_carta_campo'] ?></th>

            <?php  
                foreach ($coluna['tipos_col'] as $col):
            ?>

                <th><?= $col['descricao_modo'] ?></th>
            
            <?php
                endforeach;
            ?>
        </tr>
        
        <?php  
            foreach ($cartas as $carta):
        ?>

        <tr>                       
            <td><?= $carta['nome_jogo_carta_valor'] ?></td>                     
            <td><?= $carta['nome_valor'] ?></td>   
            <?php  
                foreach ($carta['tipos_jogos'] as $tip):
            ?>        
                <td><?= $tip['string_camp']?></td>   
            <?php
                endforeach;
            ?>
        </tr> 
        
        <?php
            endforeach;
        ?>
    </table>

    </div>
    <div >
        <a href="<?=url("login")?>">Login</a>
    </div>
    <div >
        <a href="<?=url("logout")?>">Logout</a>
    </div>
</body>
</html>