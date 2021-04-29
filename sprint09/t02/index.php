<?php

$pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=sword",
    "vkharchenk",
    "securepass"
);

session_start();

if (isset($_POST["reset-password"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    
    $sql = "SELECT login, email, name, status, password FROM users WHERE login = :login";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":login", $login);
    $stmt->execute();
    
    $login = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($login == false || $login["email"] != $email) {
        echo "<script>window.location.href = 'no-user.html';</script>";
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
        
        echo "<script>window.location.href = 'success.html';</script>";
    }
}
