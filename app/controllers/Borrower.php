<?php

namespace controllers;
require_once '../app/models/Loan.php';
use models\Loan;
require_once '../app/models/Item.php';
use models\Item;

class Borrower {

    public function __construct() {
        Auth::checkAuth('Borrower');
    }
    
    public function renderHome() {
        require_once '../app/views/borrower/home.php';
    }

    public function renderItem() {
        $item = new Item();
        $item_data = $item->getAllItemAvailable();
        require_once '../app/views/borrower/item.php';
    }

    public function renderLoan() {
        $user = $_SESSION['Username'];
        $loan = new Loan();
        $loan_data = $loan->getByUsername($user);
        require_once '../app/views/borrower/loan.php';
    }

    public function renderStatus() {
        require_once '../app/views/borrower/status.php';
    }

    public function renderReturn() {
        $user = $_SESSION['Username'];
        $loan = new Loan();
        $loan_data = $loan->getByUsername($user);
        require_once '../app/views/borrower/return.php';
    }

    public function renderAddLoanRequest() {
        $item = new Item();
        $item_data = $item->getAllItemAvailable();
        require_once '../app/views/borrower/addLoanRequest.php';
    }

    public function createLoanRequest() {
        $itemId = $_POST['ItemId'];
        $requestedQuantity = $_POST['Quantity'];
        $loanDate = $_POST['LoanDate'];
        $dueDate = $_POST['DueDate'];
    
        if ($dueDate <= $loanDate) {
            echo "Error: Due Date should be more than Loan Date.";
            return;
        }
    
        $item = new Item();
        $quantityAvailable = $item->getQuantityAvailableById($itemId);
    
        if ($requestedQuantity > $quantityAvailable) {
            echo "Error: Quantity requested exceeds available quantity.";
        } else {
            $data = [
                'UserId' => $_SESSION['UserId'],
                'ItemId' => $itemId,
                'Quantity' => $requestedQuantity,
                'LoanDate' => $loanDate,
                'DueDate' => $dueDate,
                'Status' => 'Pending'
            ];
    
            $loan = new Loan();
            $rowCount = $loan->create($data);
    
            $updateQuantityAvailable = $quantityAvailable - $requestedQuantity;
            $item->updateQuantityAvailable($itemId, $updateQuantityAvailable);
    
            if ($rowCount) {
                header('Location: /borrower/loan');
            } else {
                echo "Error creating loan request.";
            }
        }
    }
    

}

?>