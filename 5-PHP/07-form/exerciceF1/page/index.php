<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "afpa_php_4_afpa_form";
    $mysqli = @new mysqli($host, $user, $pass, $db_name);
    if($mysqli->connect_errno){
        echo("Il faut d'abord remplir le formulaire au moins une fois pour se connecter à cette page <br> <a href='../index.php'>Retour</a>");
        exit;
    }else{ 
        $result = $mysqli->query(
            'SELECT u.usersID, u.usersName, u.usersEmail, u.usersStars, usr.IDsports, s.sportsName, u.usersGender FROM users AS u 
            INNER JOIN users_sports_rel AS usr ON u.usersID = usr.IDusers
            INNER JOIN sports AS s ON s.sportsID = usr.IDsports');
            while($row = $result->fetch_array()){
                $results[$row['usersID']]['name'] = $row['usersName']; 
                $results[$row['usersID']]['mail'] = $row['usersEmail']; 
                $results[$row['usersID']]['star'] = $row['usersStars']; 
                $results[$row['usersID']]['sports'][$row['IDsports']] = $row['sportsName'];
                $results[$row['usersID']]['sexe'] = $row['usersGender'];
            }
            ksort($results);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les datas</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <h1>Listes des votes enregistrés</h1>
    <div class="container">
        <?php foreach($results as $key => $value) : ?>
            <div class="row">
                <div class="card">
                    <h2><?=$key?> : <?=$value['name'];?></h2>
                    <p>Email : <?=$value['mail'];?></p>
                    <ul>
                        <?php foreach($value['sports'] as $sport) : ?>
                            <li><?=$sport;?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="img img-<?=$value['star'];?>"></p>
                    <?php if($value['sexe'] == 0) : ?>
                        <p class="genre">Genre : Femme</p>
                    <?php else : ?>
                        <p class="genre">Genre : Homme</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="../index.php">Retour au formulaire</a>
</body>
</html>