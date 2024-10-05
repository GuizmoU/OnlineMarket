<?php

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

function verify_user($article) {
    if ($_SESSION["user_id"] == $article["user_id"]) {
        echo "
            <a href='../../pages/ModifyArticle.php?" . http_build_query($article) . "'>Modifier mon article</a>
            <a href='../../pages/DeleteArticle.php?id=" . $article["id"] . "'>Supprimer mon article</a>
        ";
    } else {
        echo "<a href='../includes/controller/details_controller.inc.php?id=" . $article["id"] . "'>Ajouter au panier</a>";
    }
}