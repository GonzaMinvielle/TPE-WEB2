<?php
require_once './controllers/productController.php';
require_once './controllers/aboutController.php';
require_once './controllers/homeController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// leemos la accion que viene por parametro

/* $aboutController = new AboutController(); */
$homeController = new HomeController();
$productController = new ProductController();

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// Tabla de Routeo

switch ($params[0]) {
    case 'home':
        $homeController->showHome();
        break;
    case 'productos':
        $productController->showAllProductos();
        break;
    /* case 'producto':
        $productsController->showProduct();
        break;*/
    /* case 'about':
        $controller = new AboutController();
        $this->$controller->showAbout();
        break; */
    default:
        echo ('404 Page not found');
        break;
}
