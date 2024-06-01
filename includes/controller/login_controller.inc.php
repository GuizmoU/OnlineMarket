<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Connecting...";

    // requires
    require_once "../config_session.inc.php";
    require_once "../model/login_model.php";
    require_once "../dbh.inc.php";

    // récuperer les info entrées
    $username = $_POST["username"];
    $password = $_POST["password"];

    // vérification erreurs
    // vérifier si les infos sont vides ou non
    if (empty(trim($username))) {
        handle_error("Please enter a username");
        header("Location: ../../pages/Login.php");
        exit();
    } 
    if (empty(trim($password))) {
        handle_error("Please enter a password");
        header("Location: ../../pages/Login.php");
        exit();
    } 

    // connexion
    try {
        // query
        if (login($pdo, $username, $password)) {
            header("Location: ../../index.php");
        } else {
            header("Location: ../../pages/Login.php");
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../../pages/Login.php");
}