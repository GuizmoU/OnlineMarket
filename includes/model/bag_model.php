<?php

function supressArticle($id, $pdo) {

    // query
    $query = "SELECT * FROM users WHERE id=:id";

    // sécurisation
    $stmt = $pdo->prepare($query);

    // application des valeurs
    $stmt->bindParam(":id", $_SESSION["user_id"]);

    // éxecution
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $prev_bag = $result["bag"];

    $new_bag = str_replace($id . ",", "", $prev_bag);
    $user_id = $_SESSION["user_id"];

    // query
    $query = "UPDATE users SET bag=:bag WHERE id=:id;";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":bag", $new_bag);
    $stmt->bindParam(":id", $user_id);

    // executer le statement
    $stmt->execute();
}