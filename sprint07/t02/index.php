<?php
    session_start();

    if (isset($_POST['password'])) {
        $_SESSION['p'] = $_POST['password'];
        $_SESSION['salt'] = $_POST['salt'];
        $_SESSION['password'] = md5($_SESSION['salt'] . $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/02 Hack it!</title>

    <style>
        .ok {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Password</h1>

    <?php
        if (isset($_POST['password_guess'])) {
            if ($_SESSION['password'] == md5($_SESSION['salt'] . $_POST['password_guess'])) {
                echo "<p class='ok'>Hacked!</p>";
                unset($_SESSION['password']);
                session_destroy();
            }
            else {
                echo "<p class='error'>Access denied!</p>";
            }
        }
    ?>

   <form action="" method="post"
        <?php
            if(isset($_SESSION['password'])) {
                echo "style='display: none;'";
            }
        ?>
    >
        <p>Password not saved at session.</p>
        <p>Password for saving to session: <input type="password" id="password" name="password" placeholder="Password to session" autofocus></p>
        <p>Salt for saving to session: <input type="password" id="salt" name="salt" placeholder="Salt to session"></p>
        <p><input type="submit" value="Save"></p>
   </form>

   <form method="post"
        <?php
            if (!isset($_SESSION['password'])) {
                echo "style='display: none;'";
            }
        ?>
    >
        <p>Password saved at session.</p>
        <p>Hash is <span><?php echo $_SESSION['password'] ?></span></p>
        <p>
            Try to guess:
            <input type="password" id="password_guess" name="password_guess" placeholder="Password to session" autofocus>
            <input type="submit" value="Check password">
        </p>
   </form>
</body>

</html>
