<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-15 20:49:04
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-17 16:10:12
 *
 * All API logic goes here
 */

require_once(__DIR__ . '/socket.php');
require_once(__DIR__ . '/parser.php');

class Api {
    private $apiSocket;

    function __construct() {
        /*
         * Configuration API
        */
        $apiHost = "localhost";
        $apiPort = 2121;

        $this->apiSocket = new ApiSocket($apiHost, $apiPort);
    }

    /**
     * Make an API call
     * @param  [String] $apiRequest []
     * @return [AnyType]             [The parsed response from the API parser]
     */
    function request($apiRequest) {
        return parseApiResponse($this->apiSocket->write($apiRequest));
    }


    /**
     * Test function to check if we receive reponse from the api server
     * @return [boolean] [If test is good]
     */
    function testApiServer() {
        return $this->request("TEST|") == "OK";
    }

    function getFractalsList() {
        return $this->request("LFRACTALS|");
    }

    function isTvReady() {
        return $this->request("TVSTATUS|");
    }

    function connectTv($code) {
        return $this->request("TVCONNECT|" . $code);
    }

    function checkTvSession($sessionID, $sessionTotp) {
        return $this->request("TVSESSIONSTATUS|" . $sessionID . "|" . $sessionTotp);
    }

}

?>