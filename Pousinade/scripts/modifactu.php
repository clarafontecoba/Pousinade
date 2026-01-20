<?php

include('../classes/Database.php');

$db = Database::getConnection();
$id = $_GET['id'];

if ($_POST) {
    $stmt = $db->prepare("
        UPDATE evenements 
        SET titre = :titre, description = :description, date_debut = :date, prix = :prix
        WHERE id = :id
    ");
    $stmt->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date' => $_POST['date_debut'],
        'prix' => $_POST['prix'],
        'id' => $id
    ]);
    header("Location: dashboard.php");
    exit;
}

$actu = $db->prepare("SELECT * FROM evenements WHERE id = :id");
$actu->execute(['id' => $id]);
$actu = $actu->fetch();
?>

<form method="post">
    <input type="text" name="titre" value="<?= htmlspecialchars($actu['titre']) ?>">
    <textarea name="description"><?= htmlspecialchars($actu['description']) ?></textarea>
    <input type="date" name="date_debut" value="<?= $actu['date_debut'] ?>">
    <input type="number" name="prix" value="<?= $actu['prix'] ?>">
    <button>Modifier</button>
</form>
