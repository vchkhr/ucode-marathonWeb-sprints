<?php

$pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=sword",
    "vkharchenk",
    "securepass"
);

session_start();

if (isset($_POST["sign-up"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $status = "user";

    $_SESSION["login"] = $login;
    $_SESSION["logged_in"] = time();
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
        echo "<script>window.location.href = 'already-registered.html';</script>";
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
        echo "<script>window.location.href = 'success.html';</script>";
    }
}
