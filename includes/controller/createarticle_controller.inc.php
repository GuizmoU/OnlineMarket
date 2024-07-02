<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // requires
    require_once "../config_session.inc.php";
    require_once "../model/createarticle_model.php";
    require_once "../dbh.inc.php";

    // récuperer les informations de l'article
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    
    // vérifier si les infos sont vides ou non
    if (empty(trim($title))) {
        handle_error("Veuillez entrez un titre");
        header("Location: ../../pages/CreateArticle.php");
        exit();
    } 
    if (empty(trim($description))) {
        handle_error("Veuillez entrez une description");
        header("Location: ../../pages/CreateArticle.php");
        exit();
    } 
    if (empty(trim($price))) {
        handle_error("Veuillez entrez un prix");
        header("Location: ../../pages/CreateArticle.php");
        exit();
    } 

    // vérifier si l'utilisateur a déjâ créer un article avec le même titre
    if (check_article($pdo, $title)) {
        handle_error("Vous avez déjà créer un article contenant le même titre");
        header("Location: ../../pages/CreateArticle.php");
        exit();
    }

    // créer l'article
    try {
        // query
        createarticle($title, $description, $price, $pdo);
        echo "Article created successfully";

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


    header("Location: ../../index.php");
}