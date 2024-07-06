<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // requires
    require_once "../config_session.inc.php";
    require_once "../model/modifyarticle_model.php";
    require_once "../dbh.inc.php";

    // récuperer les informations de l'article
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // informations originales de l'article
    $original_article = get_article();

    // vérifier si les infos sont vides ou non
    if (empty(trim($title))) {
        handle_error("Veuillez entrez un titre");
        header("Location: ../../pages/ModifyArticle.php?" . http_build_query($original_article));
        exit();
    } 
    if (empty(trim($description))) {
        handle_error("Veuillez entrez une description");
        header("Location: ../../pages/ModifyArticle.php?" . http_build_query($original_article));
        exit();
    } 
    if (empty(trim($price))) {
        handle_error("Veuillez entrez un prix");
        header("Location: ../../pages/ModifyArticle.php?" . http_build_query($original_article));
        exit();
    } 

    try {
        // Modifier l'article
        modify_article($title, $description, $price, $original_article["id"], $pdo);
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    header("Location: ../../index.php");
} else {
    // renvoyer l'utilisateur vers la page de création du compte
    header("Location: ../../index.php");
}
