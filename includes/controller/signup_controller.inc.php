<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // requires
    require_once "../config_session.inc.php";
    require_once "../model/signup_model.php";
    require_once "../dbh.inc.php";

    // récuperer les informations de l'utilisateur
    $username = $_POST["username"];
    $password = $_POST["password"];

    // vérifier si les infos sont vides ou non
    if (empty(trim($username))) {
        handle_error("Veuillez entrez un nom d'utilisateur");
        header("Location: ../../pages/Signup.php");
        exit();
    } 
    if (empty(trim($password))) {
        handle_error("Veuillez entrez un mot de passe");
        header("Location: ../../pages/Signup.php");
        exit();
    } 

    // vérifier si l'utilisateur existe déjâ
    if (user_exists($username, $pdo)) {
        handle_error("Ce nom d'utilisateur est déjà pris");
        header("Location: ../../pages/Signup.php");
        exit();
    }

    // Ajout du compte à la base de donnée
    try {
        // query
        create_user($username, $password, $pdo);

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    header("Location: ../../index.php");
} else {
    // renvoyer l'utilisateur vers la page de création du compte
    header("Location: ../../pages/Signup.php");
}
