<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer mon article</title>
</head>
<body>
    <p>Etes-vous sûr de vouloir supprimer cette article ?</p>
    <form action= <?php echo "../includes/controller/deletearticle_controller.inc.php?id=" . $_GET["id"] ?> method="post">
        <button type="submit">Oui</button>
    </form>
</body>
</html>