<?php
/**
 * Top part of the pages.
 * @author Antoine Ouellette
 */
require 'include/header-head.inc';
?>

<!-- menu -->

<!-- fin menu -->

    <?php /*
    //not logged in (user icon right)
    if( !(isset($_SESSION['authentification'])) || $_SESSION['authentification']==false )
    {
        echo "
            <a class=\"text-white\" href=\"formulaire-authentification.php\">
                <span>Connexion</span>
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-person-fill\" viewBox=\"0 0 16 16\">
                  <path d=\"M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
                </svg>
        ";
    }
    else
    //logged in (power icon right)
    {
        echo "
            <a class=\"text-white\" href=\"deconnexion.php\">
                <div class='d-flex flex-column'>
                    <span>{$_SESSION['prenom_usager']}</span>
                    <span class='text-danger'>Déconnexion</span>
                </div>
        ";
    }
    ?>
            </a>
 */