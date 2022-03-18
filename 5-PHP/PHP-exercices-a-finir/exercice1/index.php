<?php
    $string = "Hello World !";
    $tab = array_reverse(array("h1", "h2", "h3", "h4", "h5", "h6"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            list-style: none;
        }
    </style>
</head>
<body>
    <ul>
        <?php foreach($tab as $value) : ?>
            <li>
                <<?=$value;?>>
                
                <?=$string?>

                </<?=$value?>>
            </li>
        <?php endforeach; ?>
        <li>... et la suite de la page web</li>
    </ul>
    <ul>
        <?php for($i=6;$i>0;$i--) : ?>
            <li><h<?=$i?>>Hello World</h<?=$i?>></li>
        <?php endfor; ?>
        <li>... et la suite de la page web</li>
    </ul>
    <ul>
        <?php for($i=1;$i<6;$i++) : ?>
            <li><font size="<?=$i;?>">Hello world</font></li>
        <?php endfor; ?>
        <li>... et la suite de la page web</li>
    </ul>
</body>
</html>