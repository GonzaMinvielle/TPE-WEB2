<?php
require_once './controllers/menuController.php';
require_once './controllers/aboutController.php';
require_once './controllers/homeController.php';
require_once './controllers/adminController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


$aboutController = new AboutController();
$homeController = new HomeController();
$menuController = new MenuController();
$adminController = new AdminController();

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
    case 'admin':
        $adminController->showLogIn();
        break;
    case 'about':
        $aboutController->showAbout();
        break;
    default:
        echo ('404 Page not found');
        break;
}
