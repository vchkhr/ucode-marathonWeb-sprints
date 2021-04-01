<?php
    $t = time();
    $public = "91d57c8842c83a6b45f28c3e326fea43";
    $hash = md5($t . "34c938a832da12590092cd2eaf59194ed9be1661" . $public);
    
    $ch = curl_init("http://gateway.marvel.com/v1/public/comics?ts=$t&apikey=$public&hash=$hash");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    
    $html = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($html, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/09 Marvel API</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <h1>Comics from Marvel API</h1>

    <?php
        function parseJSON($json) {
            echo "<div class='data'>";

            foreach($json as $key => $value) {
                if (!is_array($value)) {
                    echo "<div class='row'>$key: <span>" . $value . "</span></div>";
                }
                else {
                    echo "<p class='title'>" . $key . "</p>";
                    parseJSON($json[$key]);
                }
            }

            echo "</div>";
        }

        parseJSON($json);
    ?>
</body>

</html>
