<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Successfully Signed In</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <h1>Welcome, <span class="italic"><?php if (isset($_SESSION["name"])) {echo $_SESSION["name"];} ?></span></h1>

    <p class="center">You have signed in and your status is <span class="italic"><?php if (isset($_SESSION["status"])) {echo $_SESSION["status"];} ?></span>.</p>

    <form action="index.php" method="post" id="sign-out">
        <p class="center">
            <input type="submit" name="sign-out" class="sign-out" value="Sign Out">
        </p>
    </form>
</body>

</html>
