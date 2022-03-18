<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
        echo 'Vous ne pouvez avoir accès à cette page sans vous connectez <a href="login.php">Connexion</a>';
        exit;
    }else{
        $login = $_SESSION['login_user'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour <?=$login?></h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>