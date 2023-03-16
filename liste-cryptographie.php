<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Liste des activites Cryptographie";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la liste des activites Cryptographie de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/liste-cards.css"];
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
        <div class="GridCards">

            <a class="ActivityButton" href="cryptographie-page.php?id=1">
                <img src="medias/globe.svg">
                <h3 class="text-align-center font-accent-color">Activite 1</h3>
            </a>

            <a class="ActivityButton" href="cryptographie-page.php?id=2">
                <img src="medias/globe.svg">
                <h3 class="text-align-center font-accent-color">Activite 2</h3>
            </a>

            <a class="ActivityButton" href="cryptographie-page.php?id=3">
                <img src="medias/globe.svg">
                <h3 class="text-align-center font-accent-color">Activite 3</h3>
            </a>

        </div>
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
$_SESSION['BACK_PAGE_PATH'] = "cryptographie.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>