<?php

include ('config.php');
include ('../class/class_database.php');

$db = new database($hote, $port, $nom_bd, $identifiant, $mot_de_passe, $encodage, $debug);
$sql = "SELECT * FROM evenement ORDER BY date_debut";
$evenements = $db->query($sql);

if (count($evenements) > 0) {
    foreach ($evenements as $evenement) {
        echo "<div>";
        echo "<h2>" . $evenement->titre . "</h2>";
        echo "<p><strong>Date :</strong> " . $evenement->date_debut . " au " . $evenement->date_fin . "</p>";
        echo "<p><strong>Prix :</strong> " . $evenement->prix . " €</p>";
        echo "<p>" . $evenement->description . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Aucun événement à afficher.</p>";
}
?>