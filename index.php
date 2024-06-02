<?php 
    require_once "./includes/config_session.inc.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>OnlineMarket</title>

<body>
    <nav>
        <ul>
            <li><a href="./index.php">Acceuil</a></li>
            <?php 
                if (!isset($_SESSION["user_id"])) {
                    echo "
                        <li><a href='./pages/Login.php'>Se connecter</a></li>
                        <li><a href='./pages/Signup.php'>Créer un compte</a></li>
                    ";
                } else {
                    echo "
                        <li><a href='./pages/Logout.php'>Se déconnecter</a></li>
                        <li><a href='./pages/CreateArticle.php'>Créer un Article</a></li>
                    ";
                }
            ?>
        </ul>
    </nav>

    <h1>Online Market</h1> 
</body>
</html>
