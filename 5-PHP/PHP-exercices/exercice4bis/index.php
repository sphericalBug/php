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
    </style>
</head>
<body>
    <h1>Un petit formulaire</h1>
    <form action="traitement.php" method="GET">
        <p>Merci de renseigner les informations suivantes :</p>
        <div class="wrap-input">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom" value="">
        </div>
        <div class="wrap-input">
            <label for="age">Votre âge : </label>
            <input type="text" name="age" id="age" value="">
        </div>
        <div class="wrap-radio">
            <label for="marit">Votre situation maritale : </label>
            <input type="radio" name="marit" id="marit" value="marié" checked> Marié
            <input type="radio" name="marit" id="marit" value="veuf(ve)"> Veuf(ve)
            <input type="radio" name="marit" id="marit" value="célibataire"> Célibataire
        </div>
        <div class="wrap-checkbox">
            <label for="hobbies">Vos centres d'intérêt : </label>
            <input type="checkbox" name="internet" id="hobbies"> Internet
            <input type="checkbox" name="micro" id="hobbies"> Micro-informatique
            <input type="checkbox" name="jeux" id="hobbies"> Jeux Vidéo
        </div>
        <div class="wrap-btn">
            <input type="reset" value="Recommencer">
            <input type="submit" value="Envoyer" name="submit-form">
        </div>
    </form>
</body>
</html>