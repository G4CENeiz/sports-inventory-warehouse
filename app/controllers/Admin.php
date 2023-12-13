<?php

namespace controllers;
require_once '../app/models/User.php';
use models\User;
require_once '../app/models/Item.php';
use models\Item;
require_once '../app/models/Loan.php';
use models\Loan;

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
        $item = new Item();
        $item_data = $item->getAll();
        require_once '../app/views/admin/inventory.php';
    }

    public function renderLoan() {
        $loan = new Loan();
        $loan_data = $loan->getAll();
        require_once '../app/views/admin/loan.php';
    }

    public function updateStatusLoanById() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loan = new Loan();
            
            $loanId = $_POST['LoanId'] ?? '';
            $status = $_POST['Status'] ?? '';
            
            $result = $loan->updateLoanStatusById($loanId, $status);
            if ($result) {
                header('Location: /admin/loan');
                exit;
            } else {
                echo "Failed to update loan status";
            }
        } else {
            echo "Error: Request method not supported.";
        }
        

    }

    public function renderReturn() {
        $loan = new Loan();
        $loan_data = $loan->getAll();
        
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
        $itemId = $_GET['ItemId'] ?? null;
        
        if (!$itemId) {
            echo "Item ID not provided.";
            exit();
        }

        $item = new Item();
        $itemData = $item->getDataById($itemId);

        if ($itemData) {
            require_once '../app/views/admin/itemEdit.php';
        } else {
            echo "User not found.";
            exit();
        
        }
        require_once '../app/views/admin/itemEdit.php';
    }

    public function createItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item = new Item();
            
            $data['ItemName'] = $_POST['ItemName'] ?? '';
            $data['ItemType'] = $_POST['ItemType'] ?? '';
            $data['QuantityAvailable'] = $_POST['QuantityAvailable'] ?? '';
            $data['QuantityTotal'] = $_POST['QuantityTotal'] ?? '';
            
            $result = $item->create($data);
            if ($result) {
                header('Location: /admin/inventory');
                exit;
            } else {
                echo "Failed to create item";
            }
        }
    }

    public function editItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item = new Item();
            
            $data['ItemId'] = $_POST['ItemId'] ?? '';
            $data['ItemName'] = $_POST['ItemName'] ?? '';
            $data['ItemType'] = $_POST['ItemType'] ?? '';
            $data['QuantityAvailable'] = $_POST['QuantityAvailable'] ?? '';
            $data['QuantityTotal'] = $_POST['QuantityTotal'] ?? '';
            
            $result = $item->update($data);
            if ($result) {
                header('Location: /admin/inventory');
                exit;
            } else {
                echo "Failed to edit item";
            }
        }
    }

    public function deleteItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item = new Item();
            
            $itemId = $_POST['ItemId'] ?? '';
            
            $result = $item->delete($itemId);
            if ($result) {
                header('Location: /admin/inventory');
                exit;
            } else {
                echo "Failed to delete item";
            }
        }
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