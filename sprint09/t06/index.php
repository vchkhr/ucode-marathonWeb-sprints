<?php

session_start();

$pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=sword",
    "vkharchenk",
    "securepass"
);

if (isset($_GET["go-main"])) {
    if (!curl_init($_SERVER["REQUEST_URL"])) {
        include("view/View.php");
        $view = new View(file_get_contents("not-found.php"));
        $view->render();
    }
    
    echo "<script>window.location.href = 'main.php';</script>";
}
else if (isset($_GET["go-sign-in"])) {
    echo "<script>window.location.href = 'sign-in.php';</script>";
}
else if (isset($_GET["go-sign-up"])) {
    echo "<script>window.location.href = 'sign-up.php';</script>";
}
else if (isset($_GET["go-reset-password"])) {
    echo "<script>window.location.href = 'reset-password.php';</script>";
}
else if (isset($_POST["sign-up"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $status = "user";

    $_SESSION["login"] = $login;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["status"] = $status;

    $sql = "SELECT COUNT(login) AS num FROM users WHERE login = :login";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":login", $login);
    $stmt->execute();

    $rowLogin = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $rowEmail = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rowLogin["num"] > 0 || $rowEmail["num"] > 0) {
        echo "<script>window.location.href = 'already-registered.php';</script>";
    }
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (login, password, name, email, status) VALUES (:login, :password, :name, :email, :status)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(":login", $login);
    $stmt->bindValue(":password", $passwordHash);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":status", $status);

    $result = $stmt->execute();
    
    if ($result) {
        echo "<script>window.location.href = 'sign-up-success.php';</script>";
    }
}
else if (isset($_POST["sign-in"])) {
    $login = $_POST["login"];
    $passwordAttempt = $_POST["password"];
    
    $sql = "SELECT login, email, name, status, password FROM users WHERE login = :login";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":login", $login);
    $stmt->execute();
    
    $login = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($login == false) {
        echo "<script>window.location.href = 'no-user.php';</script>";
    } else {
        $validPassword = password_verify($passwordAttempt, $login["password"]);
        
        if ($validPassword){
            $_SESSION["login"] = $login["login"];
            $_SESSION["logged_in"] = time();
            $_SESSION["name"] = $login["name"];
            $_SESSION["email"] = $login["email"];
            $_SESSION["status"] = $login["status"];
            
            echo "<script>window.location.href = 'sign-in-success.php';</script>";
        } else {
            echo "<script>window.location.href = 'incorrect-password.php';</script>";
        }
    }
}
else if (isset($_POST["sign-out"])) {
    unset($_SESSION["login"]);
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    unset($_SESSION["status"]);

    session_unset;
    session_destroy;
    
    echo "<script>window.location.href = 'index.php';</script>";
}
else if (isset($_POST["reset-password"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    
    $sql = "SELECT login, email, name, status, password FROM users WHERE login = :login";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":login", $login);
    $stmt->execute();
    
    $login = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($login == false || $login["email"] != $email) {
        echo "<script>window.location.href = 'no-user.php';</script>";
    } else {
        $password = substr($login["password"], -6);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = :password WHERE login = :login";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":password", $passwordHash);
        $stmt->bindValue(":login", $login["login"]);
        $stmt->execute();

        mail($login["email"], "Password Reset", "Your new password: " . $password);

        session_unset;
        session_destroy;
        
        echo "<script>window.location.href = 'reset-password-success.php';</script>";
    }
}
else {
    echo "<script>window.location.href = 'sign-up.php';</script>";
}

?>
