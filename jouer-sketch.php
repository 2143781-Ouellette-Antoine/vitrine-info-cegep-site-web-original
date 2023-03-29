<?php

/**
 * Play a sketch on the TV
 * 
 * @Author: LarochelleJ
 * @Date:   2023-03-28 15:45:39
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-28 18:04:09
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('include/api/api.php');
    session_start();

    try {
        $api = new Api();
    } catch (Exception $e) {
        echo json_encode("API_ERROR");
        return;
    }

    if (!isset($_SESSION['TV_SESSION_ID'])) {
        echo json_encode("NO_TV_SESSION");
        return;
    } 

    // Validate TV session
    if (!$api->checkTvSession($_SESSION['TV_SESSION_ID'], $_SESSION['TV_SESSION_TOTP'])) {
        echo json_encode("TV_SESSION_EXPIRED");
        return;
    }

    $sketch = $_POST['sketch'] ?? null;

    if (!isset($sketch)) {
        echo json_encode("GENERAL_ERROR");
        return;
    }


    if (!$api->playFractal($sketch, $_SESSION['TV_SESSION_ID'], $_SESSION['TV_SESSION_TOTP'])) {
        echo json_encode("ERROR_LOADING_SKETCH");
        return;
    }

    echo json_encode("GOOD");

}

