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
    <link rel="stylesheet" href="../styles/index.css">
</head>
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

    <main>
        <?php
            // Récuperer 
            $query = "SELECT * FROM users WHERE id=:id;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":id", $_SESSION["user_id"]);

            $stmt->execute();

            // récuperer le résultat du query
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $articlesId = explode(",", $result["bag"]);

            foreach ($articlesId as $key => $value) {
                $query = "SELECT * FROM articles WHERE id=:id;";

                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":id", $value);

                $stmt->execute();

                // récuperer le résultat du query
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $article = $result;

                $title = $result["title"];
                $description = $result["info"];
                $seller = $article["username"];
                
                if (!empty($value)) {
            ?>

        <div class="article">
            <p><?php echo htmlspecialchars($title); ?></p>
            <p><?php echo htmlspecialchars($description); ?></p>
            <p>Vendu par <?php echo htmlspecialchars($seller) ?></p>
            <a href=<?php echo "./Details.php?" . http_build_query($article) . "&bag=1"?>>Details</a>
        </div>


        <?php }}?>
    </main>
</body>
</html>