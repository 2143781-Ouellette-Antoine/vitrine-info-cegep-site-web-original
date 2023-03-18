<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Accueil";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page d'accueil de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/index.css"];
require 'include/html-head.inc';
?>
<body>
<div id="box">

    <div class="fixed">
        <!-- Navigation Bar -->
        <?php
        $_SESSION['NAVIGATION_BAR_TITLE'] = "";
        $_SESSION['LOGIN_BUTTON'] = true;
        require 'include/navigation-bar.inc';
        ?>
    </div>

    <div id="remaining">
        <div id="center-remaining">
            <div id="GridContainerPage">
                <div id="GridContentPage">

<?php
        /*** SELECT ********************************* */
        // Tente la lecture des données
        $requete = "SELECT nom, tv_only, icon_path, page_path FROM activite";
        $resultat = $mysqli->query($requete);

        if ($resultat) {    // si la requête a fonctionné
            if ($mysqli->affected_rows > 0) {    // si la requête a retourné au moins un enregistrement
                /* Cree un bouton pour chaque activite dans la BD. */

                while ($enreg = $resultat->fetch_row()) {     // extrait chaque activite une à une
                    $activite_nom = $enreg[0];
                    $activite_tv_only = $enreg[1];
                    $activite_icon_path = $enreg[2];
                    $activite_page_path = $enreg[3];
?>
                    <a class="ActivityButton flexbox-center-center <?php echo $activite_tv_only ? "tv-only" : ""; ?>" href="<?php echo $activite_page_path; ?>">
                        <img src="medias/<?php echo $activite_icon_path; ?>">
                        <h3 class="text-align-center font-accent-color"><?php echo $activite_nom ?></h3>
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
    </div>

    <!-- Invisible -->
    <div class="fixed invisible">
        <!-- Navigation Bar -->
        <?php
        $_SESSION['NAVIGATION_BAR_TITLE'] = "";
        $_SESSION['LOGIN_BUTTON'] = true;
        require 'include/navigation-bar.inc';
        ?>
    </div>

</div>
</body>
<?php
require 'include/nettoyage.inc';
?>