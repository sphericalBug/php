<?php
if(!isset($_POST['submit-form'])){
    echo "Vous n'avez pas accés à cette page veuillez d'abord remplir le formulaire.<br>";
    echo "<a href='../index.php'>Retour</a>";
    exit;
}else{
    //1° Les propriétés :
        //1.a : pour se connecter au serveur :
        $host = "localhost";
        $user = "root";
        $pass = "";
            //1.b : pour se connecter à la base de données :
        $db_name = "afpa_php_4_afpa_form";
        
        //2 : Connexion au serveur puis à la bdd :
            //2.a : requête de connection au serveur :
        $mysqli = new mysqli($host, $user, $pass);
        if($mysqli->connect_errno){
            echo "Échec de la connexion : ".$mysqli->connect_error;
            exit;
        }else{
            //2.b : création de la bdd avec encodage :
            if($mysqli->query("CREATE DATABASE IF NOT EXISTS $db_name DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci")){
                $mysqli->set_charset('utf8mb4');
                if(mysqli_select_db($mysqli, $db_name)){
                    //2.c : création de la table users :
                    $users_table = $mysqli->prepare("CREATE TABLE IF NOT EXISTS `users` (
                        `usersID` INT(10) NOT NULL AUTO_INCREMENT,
                        `usersName` VARCHAR(25) NOT NULL,
                        `usersEmail` VARCHAR(50) NOT NULL,
                        `usersStars` INT(1) NOT NULL,
                        `usersGender` INT(1) NOT NULL,
                        PRIMARY KEY (usersID)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci");
                    $users_table->execute();
                    //2.d : création de la table sports :
                    $sports = "CREATE TABLE IF NOT EXISTS `sports` (
                        `sportsID` INT(10) NOT NULL AUTO_INCREMENT,
                        `sportsName` VARCHAR(25) NOT NULL,
                        `sportsSlug` VARCHAR(25) NOT NULL,
                        PRIMARY KEY (sportsID)
                    )ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci";
                    $mysqli->query($sports);
                    //2.e : insertion des 5 premiers sports avec select et insert :
                    $count = $mysqli->query('SELECT count(*) AS nombre FROM sports');
                    $row = $count->fetch_array();
                    if($row[0] == 0){
                        $req = $mysqli->prepare('INSERT INTO sports (sportsName, sportsSlug) VALUES 
                            ("cricket", "cricket"),
                            ("hockey", "hockey"),
                            ("badminton", "badminton"),
                            ("football", "football"),
                            ("tennis", "tennis")
                        ');
                        $req->execute();
                    }
                    //2.f : création de la table users_sports_rel :
                    $users_sports_rel = "CREATE TABLE IF NOT EXISTS `users_sports_rel` (
                        `usrID` INT(10) NOT NULL AUTO_INCREMENT,
                        `IDusers` INT(10) NOT NULL,
                        `IDsports` INT(10) NOT NULL,
                        INDEX(IDusers), FOREIGN KEY(IDusers) REFERENCES users(usersID),
                        INDEX(IDsports), FOREIGN KEY(IDsports) REFERENCES sports(sportsID),
                        PRIMARY KEY (usrID)
                    )ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci";
                    $mysqli->query($users_sports_rel);
                }
            }else{
                echo "Échec de la création de la bdd : ".$mysqli->error;
            }

        }
        // 3° insertion des champs du formulaire :
        $nom = htmlentities(preg_replace('/(<([^>]+)>)/'," ",$_POST['nom']), ENT_QUOTES);
        $mail = htmlentities(trim($_POST['mail']));
        $star = htmlentities(trim($_POST['star']));
        $sports = $_POST['sport'];
        $genre = htmlentities(trim($_POST['genre']));
        $sports_str = implode(",", $sports);
        
        
        $requete_test = $mysqli->query('SELECT count(usersID) AS nombre, usersID, usersName, usersEmail FROM users WHERE usersName="'.$nom.'" AND usersEmail="'.$mail.'"');
        $row = $requete_test->fetch_array();
        if($row[0] < 1){
            if($mysqli->query("INSERT INTO `users` (usersName, usersEmail, usersStars, usersGender) VALUES 
            ('".$nom."','".$mail."','".$star."','".$genre."')")){
                $result = $mysqli->query('SELECT usersID, count(usersID) AS nombre FROM `users` WHERE usersName="'.$nom.'" AND usersEmail="'.$mail.'"');
                $row = $result->fetch_array();
                if($row['nombre'] > 0){
                    $IDusers = $row['usersID'];
                    foreach($sports as $value){
                        if($mysqli->query('INSERT INTO `users_sports_rel` (IDusers, IDsports) VALUES ('.$IDusers.', "'.$value.'")')){
                        }else{
                            echo "Échec de l'insertion en bdd : ".$mysqli->error;
                        }
                    }
                }
                header("location: ../index.php?form=1&nom=$nom&mail=$mail&star=$star&sports=$sports_str&genre=$genre");
            }
        }else{
            header('location: ../index.php?form=2');
        }
}