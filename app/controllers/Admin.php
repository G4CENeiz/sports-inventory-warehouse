<?php

namespace controllers;
require_once '../app/models/User.php';
use models\User;

class Admin {

    public function __construct() {
        Auth::checkAuth('Admin');
    }

    public function renderHome() {
        require_once '../app/views/admin/home.php';
    }
    
    public function renderUser() {
        $user = new User();
        $user_data = $user->getAll();
        require_once '../app/views/admin/user.php';
    }

    public function renderInventory() {
        require_once '../app/views/admin/inventory.php';
    }

    public function renderLoan() {
        require_once '../app/views/admin/loan.php';
    }

    public function renderReturn() {
        require_once '../app/views/admin/return.php';
    }

    public function renderAddUser() {
        require_once '../app/views/admin/userAdd.php';
    }

    public function renderEditUser() {
        $userId = $_GET['UserId'] ?? null;
        
        if (!$userId) {
            echo "User ID not provided.";
            exit();
        }

        $user = new User();
        $userData = $user->getDataById($userId);

        if ($userData) {
            require_once '../app/views/admin/userEdit.php';
        } else {
            echo "User not found.";
            exit();
        
        }
        require_once '../app/views/admin/userEdit.php';
    }

    public function renderAddItem() {
        require_once '../app/views/admin/itemAdd.php';
    }
    public function renderEditItem() {
        require_once '../app/views/admin/itemEdit.php';
    }

    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            
            $data['Username'] = $_POST['Username'] ?? '';
            $data['Password'] = $_POST['Password'] ?? '';
            $data['IdentityNumber'] = $_POST['IdentityNumber'] ?? '';
            $data['FirstName'] = $_POST['FirstName'] ?? '';
            $data['LastName'] = $_POST['LastName'] ?? '';
            $data['Role'] = $_POST['Role'] ?? '';
            
            $result = $user->create($data);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to create user";
            }
        }
    }

    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            
            $data['UserId'] = $_POST['UserId'] ?? '';
            $data['Username'] = $_POST['Username'] ?? '';
            $data['Password'] = $_POST['Password'] ?? '';
            $data['IdentityNumber'] = $_POST['IdentityNumber'] ?? '';
            $data['FirstName'] = $_POST['FirstName'] ?? '';
            $data['LastName'] = $_POST['LastName'] ?? '';
            $data['Role'] = $_POST['Role'] ?? '';
            
            $result = $user->update($data);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to edit user";
            }
        }
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            
            $userId = $_POST['UserId'] ?? '';
            
            $result = $user->delete($userId);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to delete user";
            }
        }
    }

}

?>