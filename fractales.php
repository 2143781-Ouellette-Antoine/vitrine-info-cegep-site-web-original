<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Fractales";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page d'accueil de la Vitrine informatique";
require 'include/html-head.inc';
?>
<body>
<!-- Navigation Bar -->
<div class="NavigationBar">
    <a id="PageTitle" href="index.php">
        <img src="medias/server.svg" alt="Icone serveur" id="PageIcon">
        <h2>Vitrine informatique</h2>
    </a>

    <a class="VerticalButton" href="login.php">
        <img src="medias/user-circle.svg" alt="Icone connexion" class="VerticalButtonIcon">
        <h3 class="font-accent-color VerticalButtonText">Se connecter</h3>
    </a>
</div>
