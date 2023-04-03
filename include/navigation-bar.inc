<?php
/**
 *
 * @author Antoine Ouellette
 */
?>
<div class="NavigationBar">
    <a id="PageTitle" href="index.php">
        <img src="medias/server.svg" alt="Icone serveur" id="PageIcon">
        <h2>Vitrine informatique</h2>
    </a>

    <a class="VerticalButton <?php echo $_SESSION['LOGIN_BUTTON'] ? "" : "invisible" ?>" href="
        <?php echo (isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN']) ? "logout.php" : "login.php"; ?>
        " id="LoginButton">
        <img src="medias/user-circle.svg" alt="Icone connexion" class="VerticalButtonIcon">
        <h3 class="font-accent-color VerticalButtonText">
            <?php echo (isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN']) ? "Se déconnecter" : "Se connecter"; ?>
        </h3>
    </a>
</div>