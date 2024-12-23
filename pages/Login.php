<?php
    require_once "../includes/config_session.inc.php";
    require_once "../includes/view/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<style>
    <?php include "../styles/main.css" ?>
</style>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <?php 
                if (!isset($_SESSION["user_id"])) { ?>
                        <li><a href="./Login.php">Se connecter</a></li>
                        <li><a href="./Signup.php">Créer un compte</a></li>
                <?php } else { ?>
                        <li><a href="./Logout.php">Se déconnecter</a></li>
                        <li><a href="./DeleteAccount.php">Supprimer ce compte</a></li>
                        <li><a href="./CreateArticle.php">Créer un Article</a></li>
                        <li><a href="./Bag.php">Panier</a></li>
                <?php } ?>
        </ul>
    </nav>
   <form action="../includes/controller/login_controller.inc.php" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">
        <?php 
            handle_error();
        ?>
        <button type="submit">Se connecter</button>
   </form> 
   <a href="./Signup.php">Créer un compte</a>
</body>
</html>