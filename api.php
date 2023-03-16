<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "API";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de l'activite API de la Vitrine informatique";
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
        <img src="https://nordicapis.com/wp-content/uploads/How-to-Design-Loosely-Coupled-Microservices-1024x576.png">
        <!-- https://assets-global.website-files.com/5ec7dad2e6f6295a9e2a23dd/62151e3aa9fdd2df825ceb82_what-is-an-api.jpg -->
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
$_SESSION['FOOTER_ACTION_TEXT'] = "Liste des API";
$_SESSION['FOOTER_ACTION_PATH'] = "liste-api.php";
require 'include/footer.inc';
?>