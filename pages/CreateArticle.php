<?php
    require_once "../includes/config_session.inc.php";
    require_once "../includes/view/createarticle_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article</title>
</head>
<body>
    <form action="../includes/controller/createarticle_controller.inc.php" method="post">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title">
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
        <label for="price">Prix</label>
        <input type="text" id="price" name="price">
        <?php handle_error(); ?>
        <button type="submit">Créer un article</button>
    </form> 
</body>
</html>