<?php
session_start();

spl_autoload_register(function ($file) {
    include("$file.php");
});

use Controllers\UserController;
use Controllers\HomeController;

$user = new UserController();
$home = new HomeController();

$url = $_SERVER['REQUEST_URI'];

//Route-ok definiálása

switch ($url) {
    case '/':
        $home->index();
        break;
    case '/register':
        $user->registerUser();
        break;
    case '/login':
        $user->logUserin();
        break;
    case '/logout':
        $user->logUserOut();
        break;
    case '/profile':
        $user->showProfile();
        break;
    case '/users':
        $user->getUsersList();
        break;
    case '/delete-user':
        $user->deleteUser();
        break;
    case '/edit-profile':
        $user->editUserProfile();
        break;
    default:
        echo '404 - Page Not Found';
        http_response_code(404);
        break;
}
