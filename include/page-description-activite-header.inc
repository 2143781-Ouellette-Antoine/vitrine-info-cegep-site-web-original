<?php
/**
 * Portion de la page Description-Activité.
 * Contient Icône-Titre-Login.
 * @author Antoine Ouellette
 */
/* Creation des variables de session */
$_SESSION['BACK_PAGE_PATH'] = "index.php";
?>
<!-- Navigation Bar -->
<div class="flexbox flex-direction-row flex-justify-content-space-between margin-all-45px">
    <!-- Bouton Vitrine Informatique -->
    <a class="flexbox flex-direction-row flex-align-items-center flex-row-gap-10px" id="Navigation-Title" href="index.php">
        <img src="medias/server.svg" alt="Icone serveur">
        <h2 class="font-accent-color">Vitrine informatique</h2>
    </a>

    <!-- Bouton Se connecter -->
    <a class="Rounded-Rectangle flexbox flex-center-center padding-horizontal-20px padding-vertical-10px"  href="login.php">
        <div class="flexbox flex-direction-row flex-align-items-center no-stretch">
            <img src="medias/user-circle.svg" alt="Icone se connecter" class="no-stretch" style="height: 1.7em"/>
            <p class="font-accent-color text-align-center no-stretch">Se connecter</p>
        </div>
    </a>
</div>

<!-- Titre -->
<div class="flexbox flex-row-gap-10px margin-all-45px grid-item-activity-description-content">
    <img src="<?php echo $_SESSION['PAGE_ICON_PATH'] ?>" alt="<?php echo $_SESSION['PAGE_ICON_ALT'] ?>" style="height: 1.7em"/>
    <h1><?php echo $_SESSION['ACTIVITY_NAME'] ?></h1>
</div>

<!-- Debut Contenu -->
<div id="grid-container-activity-description">