<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Jeu Arduino";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de l'activite Jeu Arduino de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/activite.css"];
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
        <img src="https://wallpapercave.com/wp/wp2163572.jpg">
        <h2>Description</h2>
        <p>
            Voici la description de cette activité interractive.
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

<?php
$_SESSION['BACK_BUTTON'] = true;
$_SESSION['BACK_PAGE_PATH'] = "index.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>