<?php
    session_start();
    if(!isset($_GET['submit-form'])){
        header("location: index.php");
    }else{
        $nom = htmlspecialchars(trim($_GET['nom']));
        $age = htmlspecialchars(trim($_GET['age']));
        $marit = $_GET['marit'];
        $_SESSION['error'] = "";

        // sécurité nom
        if(empty($nom)){
            $_SESSION['error'] .= "veuillez indiquer votre nom,";
        }elseif(strlen($nom) < 3){
            $_SESSION['error'] .= "Votre nom doit contenir au moins 3 caractères,";
        }
        // sécurité âge
        if(empty($age)){
            $_SESSION['error'] .= "veuillez indiquer votre âge,";
        }elseif(!is_numeric($age)){
            $_SESSION['error'] .= "Veuillez donner votre âge en chiffre,";
        }
        // sécurité situation maritale
        switch($marit){
            case 1 : $marit_str = "marié";
                break;
            case 2 : $marit_str = "veuf(ve)";
                break;
            case 3 : $marit_str = "célibataire";
                break;
            default : echo "vous etes tous funky";
                break;
        }
        // sécurité hobbies
        if(isset($_GET['hobbies'])){   
            $hobbies_tab = $_GET['hobbies'];
            $hobbies = "";
            $internet = 0;
            $micro = 0;
            $jeux = 0;
            foreach ($hobbies_tab as $key => $value){
                $hobbies .= $value.", ";
                if($value === "internet"){
                    $internet = 1;
                }
                if($value === "micro-informatique"){
                    $micro = 1;
                }
                if($value === "jeux vidéo"){
                    $jeux = 1;
                }
            }
            $hobbies_str = substr($hobbies, 0, -2);
            
        }else{
            $_SESSION['error'] .= "Veuillez cocher au moins une case pour le hobbie,";
        }
        // en cas d'erreur
        if($_SESSION['error']){
            $_SESSION['get'] = $_GET;
            header('location: index.php');
            exit(); 
        }else{
            $result = true;
            session_unset();
            session_destroy();
        }
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
    <?php if(isset($result)) : ?>
        <h1>Merci à vous, <?=$nom?></h1>
        <p>
            Vous avez donc le bel âge de <b><?=$age?></b>, vous êtes <b><?=$marit_str?></b> et vous vous intéressez à <b><?=$hobbies_str?></b>.
        </p>
        <p>
            Je m'empresse d'envoyer la requête :<br>
            <b>insert into Matable values('<?=$nom?>',<?=$age?>,'<?=$marit_str?>',<?=$internet?>,<?=$micro?>,<?=$jeux?>)</b><br>
            à notre base de données.
        </p>
    <?php endif; ?>
    <a href="index.php">Retour</a>
</body>
</html>