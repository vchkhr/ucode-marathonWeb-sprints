<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link href="style/style.css" rel="stylesheet">
    <script src="script/reset-password.js" defer></script>
</head>

<body>
    <h1>Reset Password</h1>

    <form action="index.php" method="post" id="reset-password" class="small">
        <p>
            <input type="text" id="login" name="login" placeholder="Login" autocomplete="username" required>
        </p>
        <p class="error hidden" id="login-error"></p>

        <p>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </p>
        <p class="error hidden" id="email-error"></p>

        <p class="center">
            <input type="submit" name="reset-password" class="button sign-out" value="Reset Password" required>
        </p>
    </form>

    <form action="index.php" method="get" id="go-sign-in" class="small">
        <p class="center">
            <input type="submit" name="go-sign-in" class="button go" value="Go To Sign In">
        </p>
    </form>
</body>

</html>
