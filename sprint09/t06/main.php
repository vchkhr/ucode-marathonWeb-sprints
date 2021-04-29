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
    <title>Welcome</title>
    <link href="style/style.css" rel="stylesheet">
</head> 

<body>
    <h1>Welcome, <span class="italic"><?php if (isset($_SESSION["name"])) {echo $_SESSION["name"];} ?></span></h1>
    <p class="center">Login: <?php if (isset($_SESSION["login"])) {echo $_SESSION["login"];} ?>.</p>
    <p class="center">Email: <?php if (isset($_SESSION["email"])) {echo $_SESSION["email"];} ?>.</p>
    <p class="center">Status: <?php if (isset($_SESSION["status"])) {echo $_SESSION["status"];} ?>.</p>
    
    <form action="index.php" method="post" id="sign-out" class="small">
        <p class="center">
            <input type="submit" name="sign-out" class="button sign-out" value="Sign Out">
        </p>
    </form>
</body>

</html>
