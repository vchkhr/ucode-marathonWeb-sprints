<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="style/style.css" rel="stylesheet">
    <script src="script/sign-up.js" defer></script>
</head>

<body>
    <h1>Sign Up</h1>

    <form action="index.php" method="get" id="go-sign-in" class="small">
        <p class="center">
            <input type="submit" name="go-sign-in" class="button go" value="Go To Sign In">
        </p>
    </form>

    <form action="index.php" method="post" id="sign-up" class="small">
        <p>
            <input type="text" id="login" name="login" placeholder="Login" autocomplete="username" required>
        </p>
        <p class="error hidden" id="login-error"></p>

        <p>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </p>
        <p class="error hidden" id="email-error"></p>

        <p>
            <input type="text" id="name" name="name" placeholder="Full Name" required>
        </p>
        <p class="error hidden" id="name-error"></p>

        <p>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" required>
        </p>
        <p class="error hidden" id="password-error"></p>

        <p>
            <input type="password" id="password-confirm" name="password-confirm" placeholder="Confirm Password" autocomplete="new-password" required>
        </p>
        <p class="error hidden" id="password-confirm-error"></p>

        <p class="center">
            <input type="submit" name="sign-up" class="button" value="Sign Up">
        </p>
    </form>
</body>

</html>
