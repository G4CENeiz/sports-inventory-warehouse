<?php

namespace controllers;
require_once '../app/models/User.php';
use models\User;

class Auth {

    public function login() {
        session_start();
        if (isset($_SESSION['Role'])) {
            if ($_SESSION['Role'] === 'Admin') {
                header('Location: /admin/home');
                exit;
            } else if ($_SESSION['Role'] === 'Borrower') {
                header('Location: /borrower/home');
                exit;
            } else {
                header('Location: /login');
                exit;
            }
        }
        require_once '../app/views/auth/login.php';
    }

    public function loginProcess() {
        $user = new User();
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $userData = $user->getUserDataLogin($username, $password);
        $role = $userData['Role'];
        
        if ($role === 'Admin') {
            session_start();
            $_SESSION['UserId'] = $userData['UserId'];
            $_SESSION['Username'] = $username;
            $_SESSION['Role'] = $role;
            header('Location: /admin/home');
        } else if ($role  === 'Borrower') {
            session_start();
            $_SESSION['UserId'] = $userData['UserId'];
            $_SESSION['Username'] = $username;
            $_SESSION['Role'] = $role;
            header('Location: /borrower/home');
        } else {
            header('Location: /login?error=failed');
        }
    }

    public function logout() {
        session_start();
        if (isset($_SESSION['Role'])) {
            session_unset();
            session_destroy();
        }
        header('Location: /login');
        exit;
    }

    public static function checkAuth($role = null) {
        session_start();
        if (!isset($_SESSION['Role']) || $_SESSION['Role'] !== $role) {
            header('Location: /login');
            exit;
        }
    }

}

?>