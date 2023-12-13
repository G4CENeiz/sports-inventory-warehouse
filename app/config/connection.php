<?php

namespace config;

use PDO;

class Connection {
    public $dbhost = "localhost";
    public $dbport = 1433;
    public $dbname = "master";
    public $dbuser = "sa";
    public $dbpass = "Password321";
    public $connect; // Property to hold the PDO instance

    public function __construct() {
        try {
            $this->connect = new PDO("sqlsrv:Server={$this->dbhost},{$this->dbport};Database={$this->dbname};Encrypt=true;TrustServerCertificate=true", $this->dbuser, $this->dbpass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (\PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    }
}
?>
