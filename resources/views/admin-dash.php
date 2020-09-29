<?php 
        
    if(!isset($_SESSION['user_acesso'])||($_SESSION['user_acesso'] != 1 && isset($_SESSION['user_acesso']))){
        header("Location: ".url("login"));
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        
     <h1>ADMIN</h1>
    <?php //echo $_SESSION['user_acesso']; ?>
    </div>
    <div >
        <a href="<?=url("login")?>">Login</a>
    </div>
    <div >
        <a href="<?=url("logout")?>">Logout</a>
    </div>
</body>
</html>