<?php
    if(isset($_POST['submit_form'])){
        $nom = htmlspecialchars(trim($_POST['nom']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));
        $error = [];

        if(empty($nom)){
            $error['nom'] = "Veuillez indiquer votre nom !";
        }elseif(strlen($nom) < 3){
            $error['nom'] = "Votre nom doit contenir au moins 3 caractères";
        }
        if(empty($mdp)){
            $error['mdp'] = "Veuillez indiquer votre password";
        }elseif(strlen($mdp) < 6){
            $error['mdp'] = "Votre password doit contenir au minimum 6 caractères";
        }

        if(!$error){
            session_start();
            $_SESSION['login_user'] = $nom;
            header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        h1{
            text-align: center;
        }
        form{
            margin-top: 80px;
            padding: 10px;
        }
        .wrap-input{
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
        .wrap-input:nth-child(2){
            margin: 10px 0;
        }
        .wrap-input:last-child{
            justify-content: center;
            column-gap: 2em;
        }
        .error{
            position: absolute;
            left: 50%;
            top: 40px;
            width: 50%;
            background: rgba(192, 57, 43, .2);
            border: 1px solid rgba(192, 57, 43,1.0);
            color: rgba(192, 57, 43,1.0);
            padding: 5px;
            border-radius: 10px;
            transform: translateX(-50%);
            text-align: center;
        }
        .error + .error{
            top: 100px;
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site web</h1>
    <?php if(isset($error['nom'])) : ?>
        <p class="error"><?=$error['nom'];?></p>
    <?php endif; ?>
    <?php if(isset($error['mdp'])) : ?>
        <p class="error"><?=$error['mdp'];?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <fieldset>
            <legend><h2>Connexion à la page index.php</h2></legend>
            <div class="wrap-input">
                <label for="nom">Entrez votre nom</label>
                <input type="text" name="nom" id="nom" value="<?=(isset($nom))?$nom:false;?>">
                
            </div>
            <div class="wrap-input">
                <label for="mdp">Entrez votre password</label>
                <input type="text" name="mdp" id="mdp">
                
            </div>
            <div class="wrap-input">
                <input type="submit" value="Envoyer" name="submit_form">
                <input type="reset" value="Recommencer">
            </div>
        </fieldset>
    </form>
</body>
</html>