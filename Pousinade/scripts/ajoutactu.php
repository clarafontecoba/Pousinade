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

$stmt = $db->prepare("
    INSERT INTO actualite (titre, resume, contenu, date_publication)
    VALUES (:titre, :resume, :contenu, :date_publication)
");

$stmt->execute([
    ':titre' => $_POST['titre'],
    ':resume' => $_POST['resume'],
    ':contenu' => $_POST['contenu'],
    ':date_publication' => $_POST['date_publication']
]);

header("Location: dashboard.php");
exit;
