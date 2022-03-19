<?php
    if(isset($_GET['form'])){
        $msg = $_GET['form'];
    }else{
        $msg = "";
    }
    $array_msg = array('Vous avez déjà rempli ce formulaire', 'formulaire et insertion des données validé !');
    switch($msg){
        case 1 : $message = "<span class=\"msg msg-success\">$array_msg[1]</span>";
            break;
        case 2 : $message = "<span class=\"msg msg-error\">$array_msg[0]</span>";
            break;
        default : $message = "<span>...</span>";
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body>
    <h1>Form <?=(isset($message))?$message:false;?></h1>
    <form action="admin/traitement.php" method="POST" id="form">
        <div class="wrap_input">
            <label for="nom">Name:</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="wrap_input">
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail">
        </div>
        <div class="wrap_checkbox">
            <label for="star">stars rating:</label>
            <div class="container-check-star"><input type="checkbox" name="star" id="star" value="5">5 Star</div>
            <div class="container-check-star"><input type="checkbox" name="star" id="star" value="4">4 Star</div>
            <div class="container-check-star"><input type="checkbox" name="star" id="star" value="3">3 Star</div>
            <div class="container-check-star"><input type="checkbox" name="star" id="star" value="2">2 Star</div>
            <div class="container-check-star"><input type="checkbox" name="star" id="star" value="1">1 Star</div>
        </div>
        <div class="wrap_checkbox">
            <label for="sport">sports:</label>
            <div class="container-check-sport"><input type="checkbox" name="sport[]" id="sport" value="5">tennis</div>
            <div class="container-check-sport"><input type="checkbox" name="sport[]" id="sport" value="4">football</div>
            <div class="container-check-sport"><input type="checkbox" name="sport[]" id="sport" value="3">badminton</div>
            <div class="container-check-sport"><input type="checkbox" name="sport[]" id="sport" value="2">hockey</div>
            <div class="container-check-sport"><input type="checkbox" name="sport[]" id="sport" value="1">cricket</div>
        </div>
        <div class="wrap_radio">
            <label for="genre">Gender: 
                <input type="radio" name="genre" id="genre" value="0"><span>Female</span>
                <input type="radio" name="genre" id="genre" value="1"><span>Male</span>
            </label>
        </div>
        <div class="wrap_input">
            <input type="submit" value="Insert" name="submit-form" id="submit-form">
        </div>
    </form>
    <a href="page/index.php">Afficher les datas de la BDD</a>
    <!-- <script src="script/check-event-change.js"></script> -->
</body>
</html>