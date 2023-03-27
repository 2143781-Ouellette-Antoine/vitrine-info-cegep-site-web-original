<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Ubuntu Desktop 22.04.2";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la machine virtuelle Ubuntu Desktop 22.04.2";
$_SESSION['INCLUDE_CSS_JS'] = ["css/details-vm.css"];
require 'include/html-head.inc';
?>
<body>
<!-- Navigation Bar -->
<?php
$_SESSION['NAVIGATION_BAR_TITLE'] = "";
$_SESSION['LOGIN_BUTTON'] = true;
require 'include/navigation-bar.inc';
?>

<!-- Content -->
<div id="GridContainerPage">
    <div id="GridContentPage">
        <h1><?php echo $_SESSION['PAGE_NAME'] ?></h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Ubuntu_22.04_LTS_Jammy_Jellyfish.png">

        <h2>En ligne</h2>
        <a class="VerticalButton PageActionButton EmphasisButton" href="#">
            <img src="medias/stars-light.svg" alt="Icone étoiles" class="VerticalButtonIcon">
            <h3 class="VerticalButtonText">Nouvelle session</h3>
        </a>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/server.svg" alt="Icone de floppy disk" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Charger une sauvegarde</h3>
        </a>
        <h2>Télécharger</h2>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/cd.svg" alt="Icone CD" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Télécharger l'ISO</h3>
        </a>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/server.svg" alt="Icone disque dur" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Télécharger le VHD</h3>
        </a>

        <h2>Description</h2>
        <p>
            Voici la description de la machine virtuelle.
        </p>
    </div>
</div>

<!-- Invisible -->
<div class="invisible">
    <!-- Navigation Bar -->
    <?php
    $_SESSION['NAVIGATION_BAR_TITLE'] = "";
    $_SESSION['LOGIN_BUTTON'] = true;
    require 'include/navigation-bar.inc';
    ?>
</div>

<!-- Footer -->
<?php
$_SESSION['BACK_BUTTON'] = true;
$_SESSION['BACK_PAGE_PATH'] = "liste-vm.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>