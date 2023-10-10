<?php
require_once './controller/producto_controller.php';
require_once './controller/aboutController.php';
require_once './controller/homeController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// leemos la accion que viene por parametro

$action = 'home'; // acción por defecto

// si viene definida la reemplazamos
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $this->$controller->showHome();
        break;
    case 'producto':
        $controller = new productosController();
        $this->$controller->showAllProductos();
        break;
    case 'about':
        $controller = new AboutController();
        $this->$controller->showAbout();
        break;
    default:
        echo ('404 Page not found');
        break;
}
