<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-09 21:43:40
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-12 18:41:40
 */

require_once("../include/api/socket.php");

if ($api = new ApiSocket()) {
    $reponse = $api->send("test");
    echo $reponse;
} else {
    echo "Probleme de connexion";
}

?>