<?php
session_start();

require_once(__DIR__ . '/../classes/Database.php');

/* Sécurité : accès admin uniquement */
if (!isset($_SESSION['admin_id'])) {
    header("Location: connexionadmin.php");
    exit;
}

/* Connexion à la base */
$dbInstance = Database::getInstance(
    "localhost",
    "db_pousinade",
    3306,
    "root",
    ""
);

$db = $dbInstance->getConnection();

/* Récupération des actualités */
$actualites = $db
    ->query("SELECT * FROM evenement ORDER BY id_evenement DESC")
    ->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Interface administrateur</title>
</head>
<body>
    

<h1>Dashboard administrateur</h1>

<a href="deconnexion.php">Se déconnecter</a>


<form action="ajoutactu.php" method="post" class='formulaire'>
    <h2>Ajouter une actualité</h2>
    <input type="text" name="titre" placeholder="Titre" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="date" name="date_debut" required>
    <input type="number" name="prix" step="0.01">
    <button type="submit" class = "boutonEnvoyer">Ajouter</button>
</form>

<h2>Actualités existantes</h2>
<div class="actus-admin">
    <?php foreach ($actualites as $actu) : ?>
        <div class="carte-admin">
            <strong><?= htmlspecialchars($actu['titre']) ?></strong>
            <div class="actions">
                <a class="modifier" href="modifactu.php?id=<?= (int)$actu['id'] ?>">Modifier</a>
                <a class="supprimer" href="supprimactu.php?id=<?= (int)$actu['id'] ?>" 
                   onclick="return confirm('Supprimer ?')">Supprimer</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
