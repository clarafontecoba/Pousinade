<?php
session_start();

require_once(__DIR__ . '/Database.php');


$host     = "localhost";
$database = "db_pousinade"; 
$port     = 3306;
$username = "root";
$password = "";


try {
    $dbInstance = Database::getInstance(
        $host,
        $database,
        $port,
        $username,
        $password
    );

    $pdo = $dbInstance->getConnection();
} catch (Exception $e) {
    die($e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $courriel = $_POST['courriel'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (empty($courriel) || empty($mot_de_passe)) {
        die("Veuillez remplir tous les champs.");
    }

    $stmt = $pdo->prepare("
        SELECT id_administrateur, courriel, mot_de_passe
        FROM administrateur
        WHERE courriel = :courriel
        LIMIT 1
    ");

    $stmt->execute([
        'courriel' => $courriel
    ]);

    $admin = $stmt->fetch();

    if ($admin && $mot_de_passe === $admin['mot_de_passe']) {


        $_SESSION['admin_id'] = $admin['id_administrateur'];
        $_SESSION['admin_email'] = $admin['courriel'];

        header("Location: ../scripts/dashboard.php");
        exit;

    } else {
        echo "Courriel ou mot de passe incorrect.";
    }
}
