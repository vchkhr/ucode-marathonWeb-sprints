<?php

class DatabaseConnection {
    function __construct($host, $port, $username, $password, $database) {
        $this->connection = new mysqli($host, $username, $password, $database, $port);
    }

    function __destruct() {
        $this->connection->close();
    }

    function getConnectionStatus() {
        $stat = $this->connection->get_connection_stats();

        if ($stat["connect_success"] == 1) {
            return true;
        }
        else {
            return false;
        }
    }
}

// $test = new DatabaseConnection("127.0.0.1", null, "vkharchenk", "securepass", "ucode_web");
// echo $test->getConnectionStatus();
