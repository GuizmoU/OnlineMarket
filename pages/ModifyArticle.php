
<?php
    require_once "../includes/config_session.inc.php";
    require_once "../includes/view/modifyarticle_view.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon article</title>
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
    <form action="<?php echo '../includes/controller/modifyarticle_controller.inc.php?' . http_build_query(get_article()) ?>" method="post">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value=<?php echo $_GET["title"] ?>>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value='<?php echo $_GET["info"] ?>'>
        <label for="price">Prix</label>
        <input type="text" id="price" name="price" value=<?php echo $_GET["price"] ?>>
        <?php handle_error() ?>
        <button type="submit">Modifier mon article</button>
    </form> 
</body>
</html>