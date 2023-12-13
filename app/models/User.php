<?php

namespace Models;
require_once 'app/config/connection.php';
use config\Connection;

class User {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

}


?>