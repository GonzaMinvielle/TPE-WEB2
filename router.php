<?php

/* require_once './controller/aboutController.php'; */
require_once './controllers/homeController.php';
/* require_once './controller/productController.php'; */

//Instancias

/* $productsController = new ProductController(); */
$homeController = new HomeController();
/* $aboutController = new AboutController(); */

// Parametros URL 

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
    /* case 'producto':
        $productsController->showProduct();
        break;*/
    case 'about':
        $aboutController->showAbout($id);
        break; 
    default:
        echo ('404 Page not found');
        break;
}
