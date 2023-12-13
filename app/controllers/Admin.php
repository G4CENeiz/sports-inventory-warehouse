<?php

namespace controllers;

class Admin {

    public function __construct() {
        Auth::checkAuth('Admin');
    }

    public function renderHome() {
        require_once '../app/views/admin/home.php';
    }
    
    public function renderUser() {
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
        require_once '../app/views/admin/userEdit.php';
    }

    public function renderAddItem() {
        require_once '../app/views/admin/itemAdd.php';
    }
    public function renderEditItem() {
        require_once '../app/views/admin/itemEdit.php';
    }

}

?>