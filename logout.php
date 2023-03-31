<?php
/**
 * Page d'accueil du site.
 * @author Antoine Ouellette
 */
if (isset($_SESSION['LOGGED_IN'])) {
    unset($_SESSION['LOGGED_IN']);
}

session_start();
session_destroy();
require 'include/nettoyage.inc'; /*Appel nettoyage.inc*/

//Choisir la page de retour
if ( substr($_SERVER['HTTP_REFERER'], 0, 7)==="session" ) {
    $_SESSION['BACK_PAGE_PATH'] = "details" . substr($_SERVER['HTTP_REFERER'], 7);
}
else {
    $_SESSION['BACK_PAGE_PATH'] = $_SERVER['HTTP_REFERER']??"index.php";
}

$url_retour = "Location: " . $_SESSION['BACK_PAGE_PATH'];
header($url_retour);   // renvoie vers une autre page
?>