<?php

function handle_error($msg) {
    $_SESSION["error"] = ["modifyarticle" => $msg];
}

function get_article() {
    return [
        "id" => $_GET["id"],
        "username" => $_GET["username"],
        "title" => $_GET["title"],
        "info" => $_GET["info"],
        "created_at" => $_GET["created_at"],
        "user_id" => $_GET["user_id"],
        "price" => $_GET["price"],
    ];
}

function modify_article($title, $description, $price, $id, $pdo) {
    $query = "UPDATE articles SET title=:title, info=:info, price=:price WHERE id=:id;";

    // sécurisation
    $stmt = $pdo->prepare($query);

    // application des valeurs
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":info", $description);
    $stmt->bindParam(":price", $price);

    // éxecution
    $stmt->execute();
}