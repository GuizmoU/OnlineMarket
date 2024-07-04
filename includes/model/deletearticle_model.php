<?php

function deleteArticle($id, $pdo) {
    // query
    $query = "DELETE FROM articles WHERE id=:id;";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":id", $id);

    // executer le statement
    $stmt->execute();
}