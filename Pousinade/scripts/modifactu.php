<?php

include('../classes/Database.php');
include('../configuration/config.php');

$config = new Config();
$db = Database::getInstance(
    $config->host,
    $config->database,
    $config->port,
    $config->username,
    $config->password
)->getConnection();

$id = (int) $_GET['id'];

/* Mise à jour d'une actu grâce au formulaire */
if ($_POST) {

    $stmt = $db->prepare("
        UPDATE actualite 
        SET 
            titre = :titre, 
            resume = :resume, 
            contenu = :contenu, 
            date_publication = :date_publication
        WHERE id_actualite = :id
    ");

    $stmt->execute([
        ':titre' => $_POST['titre'],
        ':resume' => $_POST['resume'],
        ':contenu' => $_POST['contenu'],
        ':date_publication' => $_POST['date_publication'],
        ':id' => $id
    ]);

    header("Location: dashboard.php");
    exit;
}

// Récupération de l'actu déjà existante*/
$stmt = $db->prepare("SELECT * FROM actualite WHERE id_actualite = :id");
$stmt->execute([':id' => $id]);
$actu = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$actu) {
    die("Actualité introuvable");
}
?>
