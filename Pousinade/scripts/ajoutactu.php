<?php

include('../classes/Database.php');

$db = Database::getConnection();

$stmt = $db->prepare("
    INSERT INTO evenements (titre, description, date_debut, prix)
    VALUES (:titre, :description, :date_debut, :prix)
");

$stmt->execute([
    'titre' => $_POST['titre'],
    'description' => $_POST['description'],
    'date_debut' => $_POST['date_debut'],
    'prix' => $_POST['prix']
]);

header("Location: dashboard.php");
exit;
?>