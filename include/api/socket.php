<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-09 21:20:18
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-10 14:47:42
 */

class ApiSocket {
    private $socket;

    function __construct() {
        /*
         * Configuration API
        */
        $apiHost = "localhost";
        $apiPort = 2121;

        if (!($this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP))) {
            // Error when creating the socket
            // socket_strerror(socket_last_error());
            return false;
        }


        if (!socket_connect($this->socket, $apiHost, $apiPort)) {
            // Issue when connecting
            // socket_strerror(socket_last_error($socket));
            return false;
        }


        return true;
    }

    function __destruct() {
        if ($this->socket instanceof Socket) {
            socket_close($this->socket);
        }
    }

    function send($query) {
        socket_write($this->socket, $query, strlen($query));
        socket_write($this->socket, "\r\n", strlen ("\r\n")); // end of line for Java

        return socket_read($this->socket, 2048);
    } 
}

?>