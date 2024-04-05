<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "hello";
} else {
    // renvoyer l'utilisateur vers la page de création du compte
    header("Location: ../pages/CreateAccount.php");
}
