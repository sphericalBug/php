<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo '<pre>';
            print_r($_SERVER);
            echo '</pre>';

            $url_array = array(
                "scheme" => $_SERVER['REQUEST_SCHEME']."://",
                "host" => $_SERVER['HTTP_HOST'],
                "path" => substr($_SERVER['PHP_SELF'], 0, -18),
                "uri" => substr($_SERVER['REQUEST_URI'], 7, -10),
                "page" => substr($_SERVER['SCRIPT_NAME'], -10)
            );

            echo '<pre>';
            print_r($url_array);
            echo '</pre>';

            $link = implode("", $url_array);
            // $link_array = preg_split("/:\/\/|\//", $_SERVER['HTTP_REFERER']);
            $link_array = preg_split("/[\/|:]/", $link, 5, PREG_SPLIT_NO_EMPTY);
        ?>
        <a href="<?=$link?>" target="_blank">url de la page : <?=$link?></a>
        <ul>
            <?php foreach($link_array as $value) : ?>
                <li><?=$value?></li>
            <?php endforeach; ?>
        </ul>
        <?php
            $str = "<script>alert('tést')</script>"; 
            $str_convert = htmlspecialchars($str, ENT_COMPAT | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8', true);
            echo $str_convert."<br>";
            $str_convert = html_entity_decode($str);
            echo $str_convert."<br>";
            echo htmlentities($str, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8', true);

            $orig = 'J\'ai "sorti" le <strong>chien</strong> tout à l\'heure';
            $a = htmlentities($orig);
            $b = html_entity_decode($a);

            echo $a; // J'ai &quot;sorti&quot; le &lt;strong&gt;chien&lt;/strong&gt; tout &amp;agrave; l'heure
            echo $b; // J'ai "sorti" le <strong>chien</strong> tout à l'heure
        ?>
    </body>
</html>