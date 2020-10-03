<?php
    // if(!isset($_SESSION['user_acesso'])||($_SESSION['user_acesso'] != 2 && isset($_SESSION['user_acesso']))){
    //     header("Location: ".url("login"));
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 5px;
        text-align: left;    
        }
    </style>
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
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
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