<?php


function user_exists($username, $pdo) {
    // query
    $query = "SELECT * FROM users WHERE username=:username";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":username", $username);

    // executer le statement
    $stmt->execute();

    // récuperer le résultat du query
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($result);
    return $result;
}

function create_user($username, $pwd, $pdo) {
    // query
    $query = "INSERT INTO users (username, pwd) VALUES (:username, :pwd);";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);

    // executer le statement
    $stmt->execute();
}