<?php

function handle_error($msg) {
    $_SESSION["error"] = ["createarticle" => $msg];
}

function createarticle($title, $description, $price, $pdo) {
    // GET USERNAME
    // query
    $query = "SELECT * FROM users WHERE id=:id";

    // sécurisation
    $stmt = $pdo->prepare($query);

    // application des valeurs
    $stmt->bindParam(":id", $_SESSION["user_id"]);

    // éxecution
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $result["username"];


    // CREATE ARTICLE
    // query
    $query = "INSERT INTO articles (username, title, info, user_id, price) VALUES (:username, :title, :info, :user_id, :price);";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":info", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":user_id", $_SESSION["user_id"]);
    $stmt->bindParam(":username", $username);

    // executer le statement
    $stmt->execute();
}