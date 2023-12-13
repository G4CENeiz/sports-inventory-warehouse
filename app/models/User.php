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
            $query = "SELECT * FROM [master].[dbo].[Users] WHERE Username = :username AND Password = :password";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
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
            $query = "INSERT INTO [master].[dbo].[Users] (Username, Password, IdentityNumber, FirstName, LastName, Role) VALUES (:username, :password, :identityNumber, :firstName, :lastName, :role)";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':identityNumber', $data['identityNumber']);
            $stmt->bindParam(':firstName', $data['firstName']);
            $stmt->bindParam(':lastName', $data['lastName']);
            $stmt->bindParam(':role', $data['role']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function update($data) {
        try {
            $query = "UPDATE [master].[dbo].[Users] SET Username = :username, Password = :password, IdentityNumber = :identityNumber, FirstName = :firstName, LastName = :lastName, Role = :role WHERE UserId = :userId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':identityNumber', $data['identityNumber']);
            $stmt->bindParam(':firstName', $data['firstName']);
            $stmt->bindParam(':lastName', $data['lastName']);
            $stmt->bindParam(':role', $data['role']);
            $stmt->bindParam(':userId', $data['userId']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function delete($userId) {
        try {
            $query = "DELETE FROM [master].[dbo].[Users] WHERE UserId = :userId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getDataById($userId) {
        try {
            $query = "SELECT * FROM [master].[dbo].[Users] WHERE UserId = :userId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

}

?>