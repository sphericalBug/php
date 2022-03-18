<?php
    session_start();
    if(isset($_SESSION['error'])) {
        $tab = explode(",", $_SESSION['error']);
        array_pop($tab);
        if(isset($_SESSION['get'])){
            $nom = $_SESSION['get']['nom'];
            $age = $_SESSION['get']['age'];
            if(isset($_SESSION['get']['hobbies'])){
                $array = $_SESSION['get']['hobbies'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>un petit formulaire</title>
    <style>
        h1{
            text-align: center;
            margin: 0;
        }
        form{
            position: relative;
            top: 140px;
            text-align: left;
            width: 70%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 10px;
        }
        .wrap-input{
            display: flex;
            margin: 20px;
        }
        .wrap-input > label{
            flex: 1 1;
        }
        .wrap-input > input[type="text"]{
            flex: 1 2;
        }
        .wrap-radio,
        .wrap-checkbox{
            display: flex;
            margin: 20px;
            flex-flow: row nowrap;
        }
        .wrap-radio > label,
        .wrap-checkbox > label{
            flex: 1 1;
        }
        .wrap-radio > input[type="radio"],
        .wrap-checkbox > input[type="checkbox"]{
            flex: 0 0;
        }
        .wrap-btn{
            display: flex;
            justify-content: center;
            column-gap: 2em;
        }
        ul.error{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            height: 120px;
        }
        ul.error li{
            width: 90%;
            text-align: center;
            list-style: none;
            padding: 5px;
            border: 1px solid #c0392b;
            background: rgba(192, 57, 43,.3);
            color: #c0392b;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Un petit formulaire</h1>
    <?php if(isset($tab)) : ?>
        <ul class="error">
            <?php foreach($tab as $value) : ?>
                <li><?=$value?></li>
            <?php endforeach; $tab = "";?>
        </ul>
    <?php endif; ?>
    <form action="formul.php" method="GET">
        <p>Merci de renseigner les informations suivantes :</p>
        <div class="wrap-input">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom" value="<?=(isset($nom))?$nom:false;?>">
        </div>
        <div class="wrap-input">
            <label for="age">Votre âge : </label>
            <input type="text" name="age" id="age" value="<?=(isset($age))?$age:false;?>">
        </div>
        <div class="wrap-radio">
            <label for="marit">Votre situation maritale : </label>
            <input type="radio" name="marit" id="marit" value="1" checked> Marié
            <input type="radio" name="marit" id="marit" value="2"> Veuf(ve)
            <input type="radio" name="marit" id="marit" value="3"> Célibataire
        </div>
        <div class="wrap-checkbox">
            <label for="hobbies">Vos centres d'intérêt : </label>
            <input type="checkbox" name="hobbies[]" id="hobbies" value="internet" <?php if(isset($array)){foreach($array as $values){if($values === "internet") echo "checked";}} ?>> Internet
            <input type="checkbox" name="hobbies[]" id="hobbies" value="micro-informatique" <?php if(isset($array)){foreach($array as $values){if($values === "micro-informatique") echo "checked";}} ?>> Micro-informatique
            <input type="checkbox" name="hobbies[]" id="hobbies" value="jeux vidéo" <?php if(isset($array)){foreach($array as $values){if($values === "jeux vidéo") echo "checked";}} ?>> Jeux Vidéo
        </div>
        <div class="wrap-btn">
            <input type="reset" value="Recommencer">
            <input type="submit" value="Envoyer" name="submit-form">
        </div>
    </form>
</body>
</html>