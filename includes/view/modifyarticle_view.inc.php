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

function handle_error() {
     if (isset($_SESSION["error"])) {
          echo("<p class='error'>" . $_SESSION["error"]["modifyarticle"] . "</p>");
          unset($_SESSION["error"]);
     }
}