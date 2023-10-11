<?php
<<<<<<< HEAD
require_once './controller/producto_controller.php';
require_once './controller/aboutController.php';
require_once './controller/homeController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// leemos la accion que viene por parametro
=======

/* require_once './controller/productController.php'; */
/* require_once './controller/aboutController.php'; */
require_once './controllers/homeController.php';

//Instancias
>>>>>>> ccc0d695140f57f2b8b64496f0dad71ea6770c40

/* $productsController = new ProductController(); */
/* $aboutController = new AboutController(); */
$homeController = new HomeController();

<<<<<<< HEAD
// si viene definida la reemplazamos
=======
// Parametros URL 

$action = 'home'; 

>>>>>>> ccc0d695140f57f2b8b64496f0dad71ea6770c40
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// Tabla de Routeo

switch ($params[0]) {
    case 'home':
<<<<<<< HEAD
        $controller = new HomeController();
        $this->$controller->showHome();
        break;
    case 'producto':
        $controller = new productosController();
        $this->$controller->showAllProductos();
=======
        $homeController->showHome();
>>>>>>> ccc0d695140f57f2b8b64496f0dad71ea6770c40
        break;
    /* case 'producto':
        $productsController->showProduct();
        break;*/
    case 'about':
<<<<<<< HEAD
        $controller = new AboutController();
        $this->$controller->showAbout();
        break;
=======
        $aboutController->showAbout($id);
        break; 
>>>>>>> ccc0d695140f57f2b8b64496f0dad71ea6770c40
    default:
        echo ('404 Page not found');
        break;
}
