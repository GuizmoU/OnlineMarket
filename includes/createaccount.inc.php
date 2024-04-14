<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // requires
    require_once "./model/createaccount_model.php";
    require_once "./dbh.inc.php";

    // récuperer les informations de l'utilisateur
    $username = $_POST["username"];
    $password = $_POST["password"];

    // vérifier si les infos sont vides ou non
    if ($username == "") {
        header("Location: ../pages/CreateAccount.php");
    } 
    if ($password == "") {
        header("Location: ../pages/CreateAccount.php");
    } 

    // vérifier si l'utilisateur existe déjâ
    if (user_exists($username, $pdo)) {
        header("Location: ../pages/CreateAccount.php");
    }

    // Ajout du compte à la base de donnée
    try {
        // query
        create_user($username, $password, $pdo);

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // renvoyer l'utilisateur vers la page de création du compte
    header("Location: ../pages/CreateAccount.php");
}
