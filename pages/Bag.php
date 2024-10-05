<?php
    require_once "../includes/dbh.inc.php";
    require_once "../includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
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
                        <li><a href="./Bag.php">Panier</a></li>
                <?php } ?>
        </ul>
    </nav>

    <main>
        <?php
            echo $_SESSION["id"];
            // Récuperer 
            $query = "SELECT * FROM users WHERE id=:id;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":id", $_SESSION["id"]);

            $stmt->execute();

            // récuperer le résultat du query
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($result);
            echo $result["bag"];

        ?>
    </main>
</body>
</html>