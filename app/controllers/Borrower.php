<?php

namespace controllers;

class Borrower {
    
    public function renderHome() {
        require_once '../app/views/borrower/home.php';
    }

    public function renderLoan() {
        require_once '../app/views/borrower/loan.php';
    }

    public function renderStatus() {
        require_once '../app/views/borrower/status.php';
    }

    public function renderReturn() {
        require_once '../app/views/borrower/return.php';
    }

    public function renderAddLoanRequest() {
        require_once '../app/views/borrower/addLoanRequest.php';
    }

}

?>