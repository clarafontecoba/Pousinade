<?php
session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=cine_track;charset=utf8", "root", "");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
