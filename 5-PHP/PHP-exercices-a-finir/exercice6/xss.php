<?php
    if(isset($_POST['submit-form'])){
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        echo $prenom.'<br>';
        echo $email.'<br>';
        echo $age.'<br>';

        try{
            // On se connecte à la BDD :
            $dbco = new PDO("mysql:host=localhost;dbname=cours;charset=utf8", 'root', '');
            // $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // On insère les données reçues si les champs sont remplis
            if(!empty($prenom) && !empty($email) && !empty($age)){
                $sth = $dbco->prepare('INSERT INTO form (prenom, mail, age) VALUES (:prenom, :mail, :age)');
                    $sth->bindParam(':prenom', $prenom);
                    $sth->bindParam(':mail', $email);
                    $sth->bindParam(':age', $age);
                    $sth->execute();
            }
            // On récupére les datas de la table
            // $sth = $dbco->prepare("SELECT prenom, mail, age FROM form");
            // $sth->execute();
            // // On affiche les datas de la table
            // $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            // $keys = array_keys($resultat);
            // for($i=0; $i < count($resultat); $i++){
            //     $n = $i + 1;
            //     echo "Utilisateur n° $n : <br>";
            //     foreach($resultat[$keys[$i]] as $key => $values){
            //         echo $key.' : '.$value.'<br>';
            //     }
            //     echo '<br>';
            // }

        }catch(PDOException $e){
            echo 'impossible de traiter les données. Erreur : '.$e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP / MySQL</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>
    <h1>Formulaire HTML</h1>
    <form action="xss.php" method="POST">
        <div class="c100">
            <label for="prenom">Prénom : </label>
            <input type="text" id="prenom" name="prenom" style="width:30em">
        </div>
        <div class="c100">
            <label for="mail">Email : </label>
            <input type="email" id="mail" name="email">
        </div>
        <div class="c100">
            <label for="age">Age : </label>
            <input type="number" id="age" name="age" min="12" max="99">
        </div>
        <div class="c100" id="submit">
            <input type="submit" value="Envoyer" name="submit-form">
        </div>
    </form>
</body>
</html>