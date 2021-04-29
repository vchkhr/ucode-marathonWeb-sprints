<?php
function autoload($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}

spl_autoload_register("autoload");

$router = new Router();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Simple Router</title>
</head>

<body>
    <h1>Simple Router</h1>
</body>

</html>
