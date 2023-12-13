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

//admin crud
$route->add('POST', '/admin/addUser', Admin::class, 'createUser');
$route->add('POST', '/admin/editUser', Admin::class, 'editUser');
$route->add('POST', '/admin/deleteUser', Admin::class, 'deleteUser');
$route->add('POST', '/admin/addItem', Admin::class, 'createItem');
$route->add('POST', '/admin/editItem', Admin::class, 'editItem');
$route->add('POST', '/admin/deleteItem', Admin::class, 'deleteItem');
$route->add('POST', '/admin/updateStatusLoan', Admin::class, 'updateStatusLoanById');

// borrower render
$route->add('GET', '/borrower/home', Borrower::class, 'renderHome');
$route->add('GET', '/borrower/item', Borrower::class, 'renderItem');
$route->add('GET', '/borrower/loan', Borrower::class, 'renderLoan');
$route->add('GET', '/borrower/status', Borrower::class, 'renderStatus');
$route->add('GET', '/borrower/return', Borrower::class, 'renderReturn');
$route->add('GET', '/borrower/addLoanRequest', Borrower::class, 'renderAddLoanRequest');

// loan request
$route->add('POST', '/borrower/getQuantityAvailable', Borrower::class, 'getQuantityAvailable');
$route->add('POST', '/borrower/addLoanRequest', Borrower::class, 'createLoanRequest');

// loan return
$route->add('POST', '/borrower/returnItem', Borrower::class, 'returnItem');


//run route
$route->run();

?>