<?php

function handle_error($msg) {
    $_SESSION["error"] = ["createarticle" => $msg];
}

function createarticle($title, $description, $price, $pdo) {
    $username = "frank";

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