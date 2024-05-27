<?php

function login($pdo, $username, $password) {
    // query
    $query = "SELECT * FROM users WHERE username=:username";

    // sécuriser le query en créant un statement
    $stmt = $pdo->prepare($query);

    // Appliquer les valeurs
    $stmt->bindParam(":username", $username);

    // executer le statement
    $stmt->execute();

    // récuperer le résultat du query
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashed_pwd = $result["pwd"];

    if (password_verify($password, $hashed_pwd)) {
        echo "Successfully connected";

        // enregistrer l'utilisateur dans la session
        $_SESSION["user_id"] = $result["id"];

        return True;
    } else {
        return False;
    }

}