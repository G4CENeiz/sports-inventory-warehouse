<?php

namespace Models;
require_once '../app/config/connection.php';
use config\Connection;

class User {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getUserDataLogin($username, $password) {
        try {
            $query = "SELECT * FROM [master].[dbo].[Users] WHERE Username = :Username AND Password = :Password";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':Username', $username);
            $stmt->bindParam(':Password', $password);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM [master].[dbo].[Users]";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function create($data) {
        try {
            $query = "INSERT INTO [master].[dbo].[Users] (Username, Password, IdentityNumber, FirstName, LastName, Role) VALUES (:Username, :Password, :IdentityNumber, :FirstName, :LastName, :Role)";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':Username', $data['Username']);
            $stmt->bindParam(':Password', $data['Password']);
            $stmt->bindParam(':IdentityNumber', $data['IdentityNumber']);
            $stmt->bindParam(':FirstName', $data['FirstName']);
            $stmt->bindParam(':LastName', $data['LastName']);
            $stmt->bindParam(':Role', $data['Role']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function update($data) {
        try {
            $query = "UPDATE [master].[dbo].[Users] SET Username = :Username, Password = :Password, IdentityNumber = :IdentityNumber, FirstName = :FirstName, LastName = :LastName, Role = :Role WHERE UserId = :UserId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':Username', $data['Username']);
            $stmt->bindParam(':Password', $data['Password']);
            $stmt->bindParam(':IdentityNumber', $data['IdentityNumber']);
            $stmt->bindParam(':FirstName', $data['FirstName']);
            $stmt->bindParam(':LastName', $data['LastName']);
            $stmt->bindParam(':Role', $data['Role']);
            $stmt->bindParam(':UserId', $data['UserId']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function delete($userId) {
        try {
            $query = "DELETE FROM [master].[dbo].[Users] WHERE UserId = :UserId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':UserId', $userId);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getDataById($userId) {
        try {
            $query = "SELECT * FROM [master].[dbo].[Users] WHERE UserId = :UserId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':UserId', $userId);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

}

?>