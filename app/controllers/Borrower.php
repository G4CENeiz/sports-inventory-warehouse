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
        $item_data = $item->getAll();
        require_once '../app/views/borrower/item.php';
    }

    public function renderLoan() {
        $loan = new Loan();
        $loan_data = $loan->getAll();
        require_once '../app/views/borrower/loan.php';
    }

    public function renderStatus() {
        require_once '../app/views/borrower/status.php';
    }

    public function renderReturn() {
        $loan = new Loan();
        $loan_data = $loan->getAll();
        require_once '../app/views/borrower/return.php';
    }

    public function renderAddLoanRequest() {
        $item = new Item();
        $item_data = $item->getAll();
        require_once '../app/views/borrower/addLoanRequest.php';
    }

    public function createLoanRequest() {
        $data = [
            'UserId' => $_SESSION['UserId'],
            'ItemId' => $_POST['ItemId'],
            'Quantity' => $_POST['Quantity'],
            'LoanDate' => $_POST['LoanDate'],
            'DueDate' => $_POST['DueDate'],
            'Status' => 'Pending'
        ];

        $loan = new Loan();
        $rowCount = $loan->create($data);

        $item = new Item();
        $quantityAvailable = $item->getQuantityAvailableById($_POST['ItemId']);
        $requestedQuantity = $_POST['Quantity'];
        $updateQuantityAvailable = $quantityAvailable - $requestedQuantity;
        $item->updateQuantityAvailable($_POST['ItemId'], $updateQuantityAvailable);

        if ($rowCount) {
            header('Location: /borrower/loan');
        } else {
            echo "Error creating loan request.";
        }
    }

    public function returnItem() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loan = new Loan();
            $item = new Item();
            $returnDate = date("Y-m-d");
            $itemId = $_POST['ItemId'];
            $quantity = $_POST['Quantity'];
            $quantityAvailable = $item->getQuantityAvailableById($itemId);
            $updateQuantityAvailable = $quantityAvailable + $quantity;
            $item->updateQuantityAvailable($itemId, $updateQuantityAvailable);


            
            $loan->updateReturnDate($_POST['LoanId'], $returnDate);
            header('Location: /borrower/return');
        } else {
            echo "Error returning item.";
        }
    }

}

?>