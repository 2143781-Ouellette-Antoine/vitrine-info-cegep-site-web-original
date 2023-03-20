<?php

/**
* @Author: jason
* @Date:   2023-03-17 14:22:27
* @Last Modified by:   jason
* @Last Modified time: 2023-03-17 14:22:27
*
* This is just a test file with basic logic
*/

require_once('../include/api/api.php');
session_start();

try {
	$api = new Api();
} catch (Exception $e) {
	echo "Api error.";
}

if (isset($api)) {
	if ($api->isTvReady()){
		echo "Tv ready";
	} else {
		echo "Tv in use";
	}

	echo "</br>";

	if (isset($_SESSION['TV_SESSION_ID'])) { // User have a TV session
		if ($api->checkTvSession($_SESSION['TV_SESSION_ID'], $_SESSION['TV_SESSION_TOTP'])) {
			echo "Session is still valid, you are using the Tv";
		} else {
			echo "Session has expired";

			// Clear old TV session data
			unset($_SESSION['TV_SESSION_ID']);
			unset($_SESSION['TV_SESSION_TOTP']);
		}
	} else if (isset($_GET['code'])) {
		$session_id = $api->connectTv($_GET['code']);
		if ($session_id) { // API server provided a session id, code is valid
			$_SESSION['TV_SESSION_ID'] = $session_id;
			$_SESSION['TV_SESSION_TOTP'] = $_GET['code'];
			echo "Session created";
		} else {
			echo "Invalid code";
		}
	}

}

?>