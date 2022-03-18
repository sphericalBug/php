<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            list-style: none;
        }
        table, td{
            border: 1px solid #000;
            border-spacing: 5px;
            margin: 15px 0;
        }
        td{
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Mise en pratique</h2>
    <?php
        echo '<pre>';
        print_r($_SERVER);
        echo '</pre>';

        $array_url = array(
            "scheme" => $_SERVER['REQUEST_SCHEME']."://",
            "host" => $_SERVER['HTTP_HOST']."/",
            "path" => substr($_SERVER['REQUEST_URI'], 1, -10),
            "page" => substr($_SERVER['PHP_SELF'], 7)
        );
        // $replace = array(':', '/');
    ?>
    <ul>
        <?php foreach($array_url as $key => $value) : ?>
            <li><?= $key ?> : <?= $value ?></li>
        <?php endforeach; ?>
        <li>
            <table>
                <?php foreach($array_url as $key => $value) : ?>
                    <tr>
                        <td><b><?=$key?></b></td>
                        <td><?=str_replace([":", "/"], "", $value)?></td>
                        <td><?=preg_replace('/[^a-zA-Z0-9-]/', "", $value)?></td>
                        <td><?=preg_replace('/[:|\/]/', "", $value)?></td>
                        <td><?=preg_replace('/[:\/]/', "", $value)?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </li>
        <li><a href="<?php foreach($array_url as $key => $value) echo $value ?>" target="_blank">url de la page</a></li>
    </ul>
    
<?php
    $texte = "Les chiens et les lapins ne veulent plus faire de chats à cause de la ferme des GonZALES";
    $array = array("chiens" => "lapines","chats" => "lapineaux");
    $pattern = array('/chiens|chien/','/chats|chat/');
    $result = preg_replace($pattern,$array, $texte);
    echo $result;

    $texte = "pays-(france|belgique|suisse)";
    foreach($array as $value) : ?>
        <p><?=$texte.$value?></p>
    <?php endforeach;?>
</body>
</html>