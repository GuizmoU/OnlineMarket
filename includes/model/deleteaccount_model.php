<?php

function deleteAccount($pdo) {

    $id = $_SESSION["user_id"];

    // query
    $query = "DELETE FROM users WHERE id=:id;";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":id", $id);

    // executer le statement
    $stmt->execute();
    unset($_SESSION["user_id"]);
}