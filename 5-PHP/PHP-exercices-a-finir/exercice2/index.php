<?php 
    date_default_timezone_set('Europe/Rome');
    $dat = getDate();
    echo "<pre>";
    print_r($dat);
    echo "</pre>";
    // $fuseau = date_default_timezone_get();
    // echo $fuseau;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getDate</title>
    <style>
        table{
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            white-space: wrap;
        }
        th, td{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>En ce jour <?=$dat["mday"];?> <?=$dat["month"];?>, <?=$dat["year"];?> sur le serveur <?=$_SERVER["SERVER_NAME"];?>, il est <?=$dat["hours"];?>h <?=$dat["minutes"];?>mn.</h2>
    <h3>Variable HTTP serveur (getenv())</h3>
    <table border="1">
        <tr>
            <th>Variable</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>GATEWAY_INTERFACE</td>
            <td><?= getenv("GATEWAY_INTERFACE");?></td>
        </tr>
        <tr>
            <td>SERVER_NAME</td>
            <td><?= getenv("SERVER_NAME");?></td>
        </tr>
        <tr>
            <td>SERVER_SOFTWARE</td>
            <td><?= getenv("SERVER_SOFTWARE");?></td>
        </tr>
        <tr>
            <td>SERVER_PROTOCOL</td>
            <td><?= getenv("SERVER_PROTOCOL");?></td>
        </tr>
        <tr>
            <td>REQUEST_METHOD</td>
            <td><?= getenv("REQUEST_METHOD");?></td>
        </tr>
        <tr>
            <td>QUERY_STRING</td>
            <td><?= getenv("QUERY_STRING");?></td>
        </tr>
        <tr>
            <td>DOCUMENT_ROOT</td>
            <td><?= getenv("DOCUMENT_ROOT");?></td>
        </tr>
        <tr>
            <td>HTTP_ACCEPT</td>
            <td><?= getenv("HTTP_ACCEPT");?></td>
        </tr>
        <tr>
            <td>HTTP_ACCEPT_CHARSET</td>
            <td><?= getenv("HTTP_ACCEPT_CHARSET");?></td>
        </tr>
        <tr>
            <td>HTTP_ACCEPT_ENCODING</td>
            <td><?= getenv("HTTP_ACCEPT_ENCODING");?></td>
        </tr>
        <tr>
            <td>HTTP_ACCEPT_LANGUAGE</td>
            <td><?= getenv("HTTP_ACCEPT_LANGUAGE");?></td>
        </tr>
        <tr>
            <td>HTTP_CONNECTION</td>
            <td><?= getenv("HTTP_CONNECTION");?></td>
        </tr>
        <tr>
            <td>HTTP_HOST</td>
            <td><?= getenv("HTTP_HOST");?></td>
        </tr>
        <tr>
            <td>HTTP_REFERER</td>
            <td><?= getenv("HTTP_REFERER");?></td>
        </tr>
        <tr>
            <td>HTTP_USER_AGENT</td>
            <td><?= getenv("HTTP_USER_AGENT");?></td>
        </tr>
        <tr>
            <td>REMOTE_ADDR</td>
            <td><?= getenv("REMOTE_ADDR");?></td>
        </tr>
        <tr>
            <td>SCRIPT_FILENAME</td>
            <td><?= getenv("SCRIPT_FILENAME");?></td>
        </tr>
        <tr>
            <td>SERVER_ADMIN</td>
            <td><?= getenv("SERVER_ADMIN");?></td>
        </tr>
        <tr>
            <td>SERVER_PORT</td>
            <td><?= getenv("SERVER_PORT");?></td>
        </tr>
        <tr>
            <td>SERVER_SIGNATURE</td>
            <td><?= getenv("SERVER_SIGNATURE");?></td>
        </tr>
    </table>
    <h3>Variable HTTP serveur ($_SERVER)</h3>
    <ul>
        <?php foreach($_SERVER as $key => $value) : ?>
            <li>$_SERVER["<?=$key?>"] : <?=$value?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>