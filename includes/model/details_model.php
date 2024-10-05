<?php

function addArticle($id, $pdo) {
    // obtenir l'ancien panier et l'id    
    // id

    $user_id = $_SESSION["user_id"];

    // ancien panier
    $bag = "";

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

    if ($prev_bag != null) {
        $bag = $prev_bag . "," . strval($id);
    } else {
        $bag = strval($id);
    }

    // ADD ARTICLE
    // query
    $query = "UPDATE users SET bag=:bag WHERE id=:id;";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":bag", $bag);
    $stmt->bindParam(":id", $user_id);

    // executer le statement
    $stmt->execute();
}