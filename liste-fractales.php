<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-16 18:33:18
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-16 19:32:40
 */

require 'include/configuration.inc';

/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Liste des activites Fractales";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la liste des activites Fractales de la Vitrine informatique";
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
                <?php
                    require_once('include/api/api.php');

                    try {
                        $api = new Api();
                    } catch (Exception $e) {
                        echo '<p class="error">Il y a eu une erreur lors du chargement. Code d\'erreur : api_reseau. </p>';
                    }

                    if (isset($api)) {
                        foreach ($api->getFractalsList() as $fractal) {
                            echo '<a class="ActivityButton" href="fractal-page.php?name='. $fractal .'">
                                    <img src="medias/globe.svg">
                                    <h3 class="text-align-center font-accent-color">'. $fractal .'</h3>
                                </a>';
                        }
                    }
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
    $_SESSION['BACK_PAGE_PATH'] = "cryptographie.php";
    $_SESSION['FOOTER_ACTION_TEXT'] = "";
    $_SESSION['FOOTER_ACTION_PATH'] = "";
    require 'include/footer.inc';
?>
