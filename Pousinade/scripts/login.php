<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Connexion</title>
</head>
<body>
    

<form action="../classes/connexionadmin.php" method="post" class="formulaire">
    <p>Courriel :</p>
    <input type="email" name="courriel" required>

    <p>Mot de passe :</p>
    <input type="password" name="mot_de_passe" required>

    <button class='boutonEnvoyer' type="submit">Se connecter</button>
</form>

</body>
</html>
