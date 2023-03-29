<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-28 17:51:02
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-28 17:53:40
 */

require_once('include/api/api.php');
session_start();

try {
    $api = new Api();
} catch (Exception $e) {
    return;
}

if (isset($_SESSION['TV_SESSION_ID'])) {
    // We refresh the TV session
    $api->checkTvSession($_SESSION['TV_SESSION_ID'], $_SESSION['TV_SESSION_TOTP']);
} 

?>