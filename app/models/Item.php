<?php

namespace Models;
require_once '../app/config/connection.php';
use config\Connection;

class Item {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM [master].[dbo].[Items]";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getAllItemAvailable() {
        try {
            $query = "SELECT * FROM dbo.GetItemWithAvailableQuantity()";
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
            $query = "INSERT INTO [master].[dbo].[Items] (ItemName, ItemType, QuantityAvailable, QuantityTotal) VALUES (:ItemName, :ItemType, :QuantityAvailable, :QuantityTotal)";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemName', $data['ItemName']);
            $stmt->bindParam(':ItemType', $data['ItemType']);
            $stmt->bindParam(':QuantityAvailable', $data['QuantityAvailable']);
            $stmt->bindParam(':QuantityTotal', $data['QuantityTotal']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function update($data) {
        try {
            $query = "UPDATE [master].[dbo].[Items] SET ItemName = :ItemName, ItemType = :ItemType, QuantityAvailable = :QuantityAvailable, QuantityTotal = :QuantityTotal WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemName', $data['ItemName']);
            $stmt->bindParam(':ItemType', $data['ItemType']);
            $stmt->bindParam(':QuantityAvailable', $data['QuantityAvailable']);
            $stmt->bindParam(':QuantityTotal', $data['QuantityTotal']);
            $stmt->bindParam(':ItemId', $data['ItemId']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function delete($itemId) {
        try {
            $query = "DELETE FROM [master].[dbo].[Items] WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $itemId);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getDataById($itemId) {
        try {
            $query = "SELECT * FROM [master].[dbo].[Items] WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $itemId);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getQuantityAvailableById($itemId) {
        try {
            $query = "SELECT QuantityAvailable FROM [master].[dbo].[Items] WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $itemId);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC); 
            return $result['QuantityAvailable'];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function updateQuantityAvailable($itemId, $quantity) {
        try {
            $query = "UPDATE [master].[dbo].[Items] SET QuantityAvailable = :QuantityAvailable WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(":ItemId", $itemId);
            $stmt->bindParam(":QuantityAvailable", $quantity);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo "". $e->getMessage();
            return null;
        }
    }

}

?>