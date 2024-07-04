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
            <a href=''>Modifier mon article</a>
            <a href='../../pages/DeleteArticle.php?id=" . $article["id"] . "'>Supprimer mon article</a>
        ";
    } else {
        echo "<button>Acheter</button>";
    }
}