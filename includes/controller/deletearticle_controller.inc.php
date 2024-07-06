<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../model/deletearticle_model.php";
    require_once "../dbh.inc.php";

    $id = $_GET["id"];

    try {
        deleteArticle($id, $pdo);
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    header("location: ../../index.php");
} else {
    // renvoyer l'utilisateur vers la page de création du compte
    header("Location: ../../index.php");
}
