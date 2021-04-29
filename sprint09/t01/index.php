<?php

$pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=sword",
    "vkharchenk",
    "securepass"
);

session_start();

if (isset($_POST["sign-out"])) {
    session_unset;
    session_destroy;
    
    echo "<script>window.location.href = 'index.html';</script>";
}

if (isset($_POST["sign-in"])) {
    $login = $_POST["login"];
    $passwordAttempt = $_POST["password"];
    
    $sql = "SELECT login, email, name, status, password FROM users WHERE login = :login";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":login", $login);
    $stmt->execute();
    
    $login = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($login == false) {
        echo "<script>window.location.href = 'no-user.html';</script>";
    } else {
        $validPassword = password_verify($passwordAttempt, $login["password"]);
        
        if ($validPassword){
            $_SESSION["login"] = $login["login"];
            $_SESSION["logged_in"] = time();
            $_SESSION["name"] = $login["name"];
            $_SESSION["email"] = $login["email"];
            $_SESSION["status"] = $login["status"];
            
            echo "<script>window.location.href = 'success.php';</script>";
        } else {
            echo "<script>window.location.href = 'incorrect.html';</script>";
        }
    }
}
