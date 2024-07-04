<?php 
    require_once "./includes/dbh.inc.php";
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
                        <li><a href='./pages/DeleteAccount.php'>Supprimer ce compte</a></li>
                        <li><a href='./pages/CreateArticle.php'>Créer un Article</a></li>
                    ";
                }
            ?>
        </ul>
    </nav>

    <h1>Online Market</h1> 

    <!-- AFFICHAGE DES ARTICLES -->
    <main>
        <?php
            // Récuperer tous les articles
            $query = "SELECT * FROM articles;";

            $stmt = $pdo->prepare($query);


            $stmt->execute();

            // récuperer le résultat du query
            $result = $stmt->fetchAll();

            foreach($result as $article) {
                $title = $article["title"];
                $description = $article["info"];
                $seller = $article["username"];

                if ($article["user_id"] == $_SESSION["user_id"]) {
                    $seller = "Vous";
                }
        ?>

        <!-- Article_-->
        <div>
            <p><?php echo htmlspecialchars($title); ?></p>
            <p><?php echo htmlspecialchars($description); ?></p>
            <p>Vendu par <?php echo htmlspecialchars($seller); ?></p>
            <a href=<?php echo "./pages/Details.php?" . http_build_query($article) ?>>Details</a>
        </div>

        <?php } ?>
    </main>
</body>
</html>
