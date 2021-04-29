<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link href="style/style.css" rel="stylesheet">
    <script src="script/sign-in.js" defer></script>
</head>

<body>
    <h1>Sign In</h1>

    <form action="index.php" method="get" id="go-sign-up" class="small">
        <p class="center">
            <input type="submit" name="go-sign-up" class="button go" value="Go To Sign Up">
        </p>
    </form>

    <form action="index.php" method="post" id="sign-in" class="small">
        <p>
            <input type="text" id="login" name="login" placeholder="Login" autocomplete="username" required>
        </p>
        <p class="error hidden" id="login-error"></p>

        <p>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="current-password" required>
        </p>
        <p class="error hidden" id="password-error"></p>

        <p class="center">
            <input type="submit" name="sign-in" class="button sign-in" value="Sign In" required>
        </p>
    </form>

    <form action="index.php" method="get" id="go-reset-password" class="small">
        <p class="center">
            <input type="submit" name="go-reset-password" class="button sign-out" value="Reset Password">
        </p>
    </form>
</body>

</html>
