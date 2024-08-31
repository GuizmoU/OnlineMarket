<?php
    require_once "../includes/config_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<style>
    <?php include "../styles/main.css" ?>
</style>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">Acceuil</a></li>
            <?php 
                if (!isset($_SESSION["user_id"])) { ?>
                        <li><a href="./Login.php">Se connecter</a></li>
                        <li><a href="./Signup.php">Créer un compte</a></li>
                <?php } else { ?>
                        <li><a href="./Logout.php">Se déconnecter</a></li>
                        <li><a href="./DeleteAccount.php">Supprimer ce compte</a></li>
                        <li><a href="./CreateArticle.php">Créer un Article</a></li>
                <?php } ?>
        </ul>
    </nav>
    <p>Etes-vous sûr de vouloir vous déconnecter ?</p>
    <form action="../includes/controller/logout_controller.inc.php" method="post">
        <button type="submit">Oui</button>
    </form>
</body>
</html>