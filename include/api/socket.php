<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-09 21:20:18
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-15 21:52:21
 *
 * Socket used to communicate with the API server
 */

class ApiSocket {
    private $socket;

    function __construct($apiHost, $apiPort) {
        if (!($this->socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP))) {
            // Error when creating the socket
            throw new Exception(socket_last_error($this->socket));
        }


        if (!@socket_connect($this->socket, $apiHost, $apiPort)) {
            // Issue when connecting
            throw new Exception(socket_last_error($this->socket));
        }
    }

    function __destruct() {
        if ($this->socket instanceof Socket) {
            socket_close($this->socket);
        }
    }

    /**
     * Write data on the API socket
     * @param  [String] $query [Query to write on the socket]
     * @return [String]        [Response from API server]
     */
    function write($query) {
        socket_write($this->socket, $query, strlen($query));
        socket_write($this->socket, "\r\n", strlen ("\r\n")); // end of line for Java

        return socket_read($this->socket, 2048);
    } 
}

?>