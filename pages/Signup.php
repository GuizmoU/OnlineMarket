<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
</head>
<body>
   <form action="../includes/controller/signup.inc.php" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">
        <?php
        ?>
        <button type="submit">Créer un compte</button>
   </form> 
   <a href="./Login.php">Se connecter</a>
</body>
</html>