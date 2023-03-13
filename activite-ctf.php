<?php
/**
 * Page de description de l'activité Fractales.
 * @author Antoine Ouellette
 */
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['ACTIVITY_NAME'] = "Capture the Flag";
$_SESSION['TAB_TITLE'] = $_SESSION['ACTIVITY_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de description de l'activité " . $_SESSION['ACTIVITY_NAME'];
require 'include/html-head.inc';
/* Creation des variables de session a passer a page-description-activite-header.inc */
$_SESSION['PAGE_TITLE'] = "Capture the Flag";
$_SESSION['PAGE_ICON_PATH'] = "medias/locked-file.svg";
$_SESSION['PAGE_ICON_ALT'] = "Icône de fichier cadenasé";
require 'include/page-description-activite-header.inc';
?>
<div id="grid-item-activity-description-content">
    <div class="flexbox flex-justify-content-center">
        <img class="activity-decription-image" src="https://www.treehugger.com/thmb/H2T140vCOLxad6YeqV2j6x8-i6U=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/8-b3b667829a6c40449b7354eacab2873d.jpg">
    </div>
    <h2 class="padding-vertical-10px padding-top-30px">Description</h2>
    <p class="no-stretch">
        Voici la description de cette activité interractive.
    </p>
</div>

<?php
include_once 'include/page-description-activite-footer.inc';
?>