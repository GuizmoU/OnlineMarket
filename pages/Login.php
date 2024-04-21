<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
   <form action="../includes/login.inc.php" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">
        <button type="submit">Se connecter</button>
   </form> 
   <a href="./Signup.php">Créer un compte</a>
</body>
</html>