<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-09 21:43:40
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-15 21:53:07
 *
 * Example file on how to use the API class and test it
 */

require_once("../include/api/api.php");

try { // Always catch the exception
    $api = new Api();
} catch (Exception $e) {
    // Manage error
    die("Problème de connexion.");
}

if ($api->testApiServer()) {
    echo "Le test a fonctionné.";
}

?>