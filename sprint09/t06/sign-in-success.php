<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Successfully Signed In</title>
    <link href="style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Signed In, <span class="italic"><?php if (isset($_SESSION["name"])) {echo $_SESSION["name"];} ?></span></h1>

    <p class="center">You have signed in and your status is <span class="italic"><?php if (isset($_SESSION["status"])) {echo $_SESSION["status"];} ?></span>.</p>

    <form action="index.php" method="get" id="go-main" class="small">
        <p class="center">
            <input type="submit" name="go-main" class="button" value="Go to Main" required>
        </p>
    </form>
</body>

</html>
