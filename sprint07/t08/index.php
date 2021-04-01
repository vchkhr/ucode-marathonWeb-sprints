<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/08 Show other sites</title>
</head>

<body>
    <h1>Show other sites</h1>

    <form action="" method="post">
        <input type="url" name="url" placeholder="url">
        <input type="submit" value="GO">
    </form>

    <form action="" method="post">
        <input type="text" name="reset" value="reset" style="display: none">
        <input type="submit" value="Back">
    </form>

    <div>
        <code>
            <?php
                if (isset($_POST["url"])) {
                    $html = file_get_contents($_POST["url"]);

                    if (strpos($html, "<body>") !== false) {
                        $html = explode("<body>", $html)[1];
                        $html = explode("</body>", $html)[0];
                        $html = "<body>" . $html . "</body>";
                    }
                    else if (strpos($html, "<body") !== false) {
                        $html = explode("<body", $html)[1];
                        $html = explode("</body>", $html)[0];
                        $html = "<body" . $html . "</body>";
                    }

                    $html = str_replace("<", "&#60;", $html);
                    $html = str_replace(">", "&#62;", $html);
                    $html = nl2br($html);

                    echo $html;
                }
                
                if (isset($_POST["reset"])) {
                    echo "Type an URL...";
                }
            ?>
        </code>
    </div>

</body>

</html>
