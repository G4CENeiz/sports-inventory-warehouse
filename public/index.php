<?php

require_once '../app/config/Router.php';
use config\Router;
require_once '../app/controllers/Auth.php';
use controllers\Auth;
require_once '../app/controllers/Admin.php';
use controllers\Admin;
require_once '../app/controllers/Borrower.php';
use controllers\Borrower;

$route = new Router();
//auth
$route->add('GET', '/login', Auth::class, 'login');
$route->add('POST', '/login', Auth::class, 'loginProcess');
$route->add('GET', '/logout', Auth::class, 'logout');

//admin render
$route->add('GET', '/admin/home', Admin::class, 'renderHome');
$route->add('GET', '/admin/user', Admin::class, 'renderUser');
$route->add('GET', '/admin/inventory', Admin::class, 'renderInventory');
$route->add('GET', '/admin/loan', Admin::class, 'renderLoan');
$route->add('GET', '/admin/return', Admin::class, 'renderReturn');
$route->add('GET', '/admin/addUser', Admin::class, 'renderAddUser');
$route->add('GET', '/admin/editUser', Admin::class, 'renderEditUser');
$route->add('GET', '/admin/addItem', Admin::class, 'renderaddItem');
$route->add('GET', '/admin/editItem', Admin::class, 'renderEditItem');

// borrower render
$route->add('GET', '/borrower/home', Borrower::class, 'renderHome');
$route->add('GET', '/borrower/loan', Borrower::class, 'renderLoan');
$route->add('GET', '/borrower/status', Borrower::class, 'renderStatus');
$route->add('GET', '/borrower/return', Borrower::class, 'renderReturn');
$route->add('GET', '/borrower/addLoanRequest', Borrower::class, 'renderAddLoanRequest');

//run route
$route->run();

?>