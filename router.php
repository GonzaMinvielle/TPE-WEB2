<?php

require_once './controllers/menuController.php';
require_once './controllers/aboutController.php';
require_once './controllers/homeController.php';
require_once './controllers/userController.php';
require_once './controllers/authController.php';
require_once './controllers/adminController.php';
require_once './helpers/authHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$adminController =  new AdminController();
$authController = new AuthController();
$homeController = new HomeController();
$menuController = new MenuController();
$userController = new UserController();
$authHelper = new AuthHelper();

// Tabla de Routeo

switch ($params[0]) {
    case 'home':
        $homeController->showHome();
        break;
    case 'register':
        $authController->showRegister();
        break;
    case 'registered':
        $authController->registered();
        break;
    case 'logged':
        $authController->logged();
        break;

    case 'menu':
        if (!isset($params[1]))
            $menuController->showMenu();
        else {
            $menuController->showProductsByCategory($params[1]);
        }
        break;
    case 'producto':
        $menuController->showProduct($params[1]);
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'logout':
        $authHelper->logout();
        break;
    case 'about':
        $aboutController = new AboutController();
        $aboutController->showAbout();
        break;
    case 'admin':
        $userController->showAdmin();
        break;

    default:
        echo ('404 Page not found');
        break;
}
