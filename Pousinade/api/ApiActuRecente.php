<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

include_once('../configuration/config.php');

try {
    $config = new Config();
    $dbh = new PDO(
        "mysql:host={$config->host};dbname={$config->database};port={$config->port}",
        $config->username,
        $config->password
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur de connexion : ' . $e->getMessage()]);
    exit;
}

// Récupérer le nombre d'actualités à afficher (par défaut 3)
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 3;

try {
    // Requête simple : 1 actualité = 1 image maximum
    $requete = "
        SELECT 
            a.id_actualite,
            a.titre,
            a.resume,
            a.contenu,
            a.date_publication,
            i.chemin as image
        FROM actualite a
        LEFT JOIN image_actualite ia ON a.id_actualite = ia.id_actualite
        LEFT JOIN image i ON ia.id_image = i.id_image
        ORDER BY a.date_publication DESC
        LIMIT :limit
    ";
    
    $stmt = $dbh->prepare($requete);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    $actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats en JSON
    echo json_encode($actualites, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur SQL : ' . $e->getMessage()]);
}
?>