<?php
// Analyse du formulaire reçu :
    // initialisation des variables :
        // Libellé des intérets utilisateur
        $interet = '';
        // Partie constante de la requête SQL
        $marequ = 'insert into Matable values(';
        // Récupération nom et âge
        $marequ = $marequ."'".$_GET['nom']."',".$_GET['age'].",";
        // Récup situation maritale (bouton radio dans le form) 
        $marequ = $marequ."'".$_GET['marit']."',";
            // variante de syntaxe avec des concaténations implicites
                // Partie constante de la requête SQL
                $marequ =  'insert into Matable values(';
                // Récupération nom e âge
                $marequ .= "'".$_GET['nom']."',".$_GET['age'].",";
                // Récupération situation maritale (bouton radio dans le form)
                $marequ .= "'".$_GET['marit']."',";
        // Récupération des centres intéret utilisateur (checkbox dans le form)
        // avec concaténation du libellé intérets utilisateur
        if(isset($_GET["internet"])){
            $marequ = $marequ."1, ";
            $interet = "Internet, ";
        }else{
            $marequ = $marequ."0, ";
        }
        if(isset($_GET["micro"])){
            $marequ = $marequ."1, ";
            $interet = "micro-informatique, ";
        }else{
            $marequ = $marequ."0, ";
        }
        if(isset($_GET["jeux"])){
            $marequ = $marequ."1) ";
            $interet = "jeux vidéo";
        }else{
            $marequ = $marequ."0) ";
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
    <h2>Merci à vous, <?=$_GET['nom'];?></h2>
    <p>
        Vous avez donc le bel âge de <b><?= $_GET['age']; ?></b> ans, vous êtes <b><?= $_GET['marit'];?></b>
    </p>
    <p>
        et vous vous intéressez à 
        <b><?= $interet; ?></b>
    </p>
    <p>
        Je m'empresse d'envoyer la requête : <br>
        <b><?=$marequ;?><br> à notre base de donnée.</b>
    </p>
</body>
</html>