<?php
include("./config.php");
require_once './controllers/menuController.php';
require_once './controllers/homeController.php';
require_once './controllers/userController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);



$homeController = new HomeController();
$menuController = new MenuController();
$adminController = new UserController();

// Tabla de Routeo

switch ($params[0]) {
    case 'home':
        $homeController->showHome();
        break;
    case 'menu':
        if (!isset($params[1]))
            $menuController->showMenu();
        else {
            $menuController->showProductsByCategory($params[1]);
        }
        break;
    case 'login':
        $adminController->showLogin();
        break;
    case 'nosotros':
        $homeController->showAbout();
        break;
    case 'admin':
        $adminController->showAdmin();
        break;
break;
    default:
        echo ('404 Page not found');
        break;
}
