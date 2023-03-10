<?php

/**
 * Configurations pour la connexion avec la base de donnees.
 * @author Antoine Ouellette
 */

//Initialise la session
session_start();

//Se brancher a la base de donnees
mysqli_report(MYSQLI_REPORT_OFF); // PHP 8

@$mysqli = new mysqli("127.0.0.1", "vanilla", "classic", "vitrine_info");

if ($mysqli->connect_errno) {
    die("Echec lors de la connexion a la base de donnees");
}
$mysqli->set_charset("utf8mb4");


?>

