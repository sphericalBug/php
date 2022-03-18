<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case 'resume' : $link = 'page/resume.php';
                break;
            case 'work' : $link = 'page/work.php';
                break;
            case 'contact' : $link = 'page/contact.php';
                break;
            case 'about' : $link = 'page/about.php';
                break;
            default : $link = "<h1>Erreur 404</h1>";
                break;
        }
    }

    if(!empty($_GET['m'])){$msg = $_GET['m'];}else{$msg = 0;}
    $array = array("...", "formulaire validé", "formulaire invalide");

    if(!empty($_GET['m'])){$msg = $_GET['m'];}else{$msg = 0;}
   
    switch($msg){
        case 1 : $message = "<span>formulaire validé</span>"; break;
        case 2 : $message = "<span>formulaire invalide</span>"; break;
        default : $message = "<span>...</span>";
    }
    
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="page">
    <?php require('inc/inc_nav.php'); ?>
    <div class="wrapper">
        <?php require('inc/inc_header.php'); ?>
        <!-- contenu de la page -->
            <?php (!isset($page)) ? require('page/about.php') : require($link);?>
        <!-- fin du contenu de ma page -->
        <?php require('inc/inc_footer.php'); ?>
    </div><!-- end wrapper -->
</div><!-- end-page  -->
    <script src="script/script.js"></script>
</body>
</html>