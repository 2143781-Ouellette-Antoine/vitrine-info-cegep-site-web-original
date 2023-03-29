<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-28 12:39:37
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-28 14:48:43
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

    if (!$api->isTvReady()) {
        echo json_encode("TV_IN_USE");
        return;
    }


    $code = $_POST['totp'] ?? null;

    if (!isset($code)) {
        echo json_encode("GENERAL_ERROR");
        return;
    }


    $tv_session_id = $api->connectTv($code);
    $response = "";

    if ($tv_session_id) { // API server provided a session id, code was valid
        $_SESSION['TV_SESSION_ID'] = $tv_session_id;
        $_SESSION['TV_SESSION_TOTP'] = $code;
        $response = "GOOD_CODE";
    } else {
        $response = "INVALID_CODE";
    }

    echo json_encode($response);

}

?>