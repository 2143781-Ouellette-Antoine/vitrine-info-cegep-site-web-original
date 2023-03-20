<?php
/**
 * Nettoyage mysqli
 * @author Antoine Ouellette
 */

//Refermer le branchement a la base de donnees
if (isset($mysqli)) {
    $mysqli->close();
}

?>