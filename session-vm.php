<?php
/**
 *
 * @author Antoine Ouellette
 */
//Rediriger l'utilisateur s'il n'est pas connecte:
if (!isset($_SESSION['LOGGED_IN']) || !$_SESSION['LOGGED_IN']) {
    header("location: login.php");
}

echo "hello! session-vm.php";