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
<body>
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