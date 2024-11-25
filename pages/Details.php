<?php
    require_once "../includes/config_session.inc.php";
    require_once "../includes/view/details_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<style>
    <?php include "../styles/main.css" ?>
    <?php include "../styles/details.css" ?>
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
    <?php $article = get_article(); ?>
    <section>
        <div>
            <!-- image -->
            <h2><?php echo $article["title"] ?></h2>
        </div>
        <div>
            <p><?php echo $article["info"] ?></p>
            <p>Mis en vente par <?php echo $article["username"] ?>, le <?php echo $article["created_at"] ?></p>
            <p><?php echo $article["price"] ?> Chf</p>
        </div>
        <?php verify_user($article); ?>
    </section>
</body>
</html>