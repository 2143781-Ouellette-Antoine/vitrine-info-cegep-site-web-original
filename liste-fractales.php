<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-16 18:33:18
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-25 15:24:24
 */

require 'include/configuration.inc';

/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = "Choisissez une fractale";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la liste des activites Fractales de la Vitrine informatique";
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
            <div class="GridCards">
                <?php
                    require_once('include/api/api.php');

                    try {
                        $api = new Api();
                    } catch (Exception $e) {
                        echo '<p class="error">Il y a eu une erreur lors du chargement. Code d\'erreur : api_reseau. </p>';
                    }

                    if (isset($api)) {
                        $requete_sql = "SELECT `image_path` FROM `fractales` WHERE `nom` LIKE ?;";

                        // We get the list of the active fractal sketch. 
                        // On the database, there might be some entries of inactive / deleted sketch.
                        foreach ($api->getFractalsList() as $fractal) {
                            $stmt = $mysqli->prepare($requete_sql);
                            $image_path = "medias/img/default-image.png";

                            if ($stmt) {
                                $stmt->bind_param("s", $fractal);

                                if ($stmt->execute()) {
                                    $resultat = $stmt->get_result();

                                   if ($enreg = $resultat->fetch_assoc()) { 
                                        $image_path = $enreg['image_path'];
                                    }
                                 
                                    $stmt->free_result();
                                    $stmt->close();

                                } else {
                                    echo '<p class="error">Il y a eu une erreur lors du chargement. Code d\'erreur : base_de_donnees. </p>';
                                    break;
                                }
                            }

                            echo '<a href="#">
                                    <div class="GridContentItem">
                                        <img src="' . $image_path .'">
                                
                                        <p>
                                        '. $fractal .'
                                        </p>
                                    </div>
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
    $_SESSION['BACK_PAGE_PATH'] = "fractales.php";
    $_SESSION['FOOTER_ACTION_TEXT'] = "";
    $_SESSION['FOOTER_ACTION_PATH'] = "";
    require 'include/footer.inc';
    require 'include/nettoyage.inc';
?>
