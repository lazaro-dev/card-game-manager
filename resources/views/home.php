<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        
        <?php if($nomes): 
            foreach ($nomes as $nome):
            ?>
                <h2><?= $nome['usuario']; ?></h2>
            <?php
            endforeach;
        else:
        ?>
            <h2>Sem dados</h2>
        <?php
        endif; ?>

    </div>
    <div >
        <a href="<?=url("login")?>">Login</a>
    </div>
</body>
</html>