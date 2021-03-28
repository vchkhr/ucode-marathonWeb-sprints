<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Normal space</title>
</head>
<body>
    <p>a name of file of the executed script: <?php echo $_SERVER["PHP_SELF"];?></p>
    <p>arguments passed to the script: <?php print_r($_SERVER["argv"]);?></p>
    <p>IP address of the server: <?php echo $_SERVER["SERVER_ADDR"];?></p>
    <p>a name of host that invoke current script: <?php echo $_SERVER["HTTP_HOST"];?></p>
    <p>a name and a version of the information protocol: <?php echo $_SERVER["SERVER_PROTOCOL"];?></p>
    <p>a query method: <?php echo $_SERVER["QUERY_STRING"];?></p>
    <p>User-Agent information: <?php echo $_SERVER["HTTP_USER_AGENT"];?></p>
    <p>IP address of the client: <?php echo $_SERVER["REMOTE_ADDR"];?></p>
    <p>a list of parameters passed by URL:
        <?php
            foreach ($_SERVER as $param => $value) {
                echo "$param = $value;\n";
            }
        ?>
    </p>
</body>
</html>
