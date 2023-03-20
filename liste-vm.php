<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Machines virtuelles";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la liste des machines virtuelles de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/liste-vm.css"];
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

<?php
        /*** SELECT ********************************* */
        // Tente la lecture des données
        $requete = "SELECT id, nom, thumbnail_path FROM vm ORDER BY ordre";
        $resultat = $mysqli->query($requete);

        if ($resultat) {    // si la requête a fonctionné
            if ($mysqli->affected_rows > 0) {    // si la requête a retourné au moins un enregistrement
                /* Cree un bouton pour chaque activite dans la BD. */

                while ($enreg = $resultat->fetch_row()) {     // extrait chaque activite une à une
                    $vm_id = $enreg[0];
                    $vm_nom = $enreg[1];
                    $thumbnail_path = $enreg[2];
?>
                    <a class="VMButton" href="details-vm.php?id=<?php echo $vm_id; ?>">
                        <img src="<?php echo $thumbnail_path; ?>">
                        <div class="divTextCard">
                            <h3 class="text-align-center font-accent-color"><?php echo $vm_nom; ?></h3>
                        </div>
                    </a>
<?php
                }
            }
            $resultat->free();   // libère immédiatement la mémoire qui était allouée
        }
        /******************************************** */
?>
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
$_SESSION['BACK_PAGE_PATH'] = "vm.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>
