<?php
    if(!isset($_POST['submit-form'])){
        echo "Vous ne pouvez pas visiter cette page <a href='../index.php?page=contact'>Retour</a>";
        exit();
    }else{
        $nom = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));
        
        $url = getenv('REQUEST_SCHEME').'://'.getenv('HTTP_HOST')."/".substr($_SERVER['PHP_SELF'], 0, -19)."index.php?page=contact";
        
        if(!isset($nom) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !isset($message)){
            header('location: '.$url."&m=2");
        }else{
            header('location: '.$url."&m=1&name=$nom&email=$email&message=$message");
        }
    }
?>