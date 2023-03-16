<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Machines virtuelles";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de l'activite Machines virtuelles de la Vitrine informatique";
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
        <img src="https://www.oreilly.com/radar/wp-content/uploads/sites/3/2019/11/in-dis-canyon-3a-1400x950.jpg">
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
$_SESSION['FOOTER_ACTION_TEXT'] = "Liste des machines virtuelles";
$_SESSION['FOOTER_ACTION_PATH'] = "liste-vm.php";
require 'include/footer.inc';
?>