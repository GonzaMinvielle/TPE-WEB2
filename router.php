<?php
require_once './controller/producto_controller.php';


// leemos la accion que viene por parametro

$action = 'home'; // acción por defecto

//Variable Controller
$controllerProduct = new ProductoController();

// si viene definida la reemplazamos
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $this->$controllerProduct->showHome();
        break;
    case 'producto':
        $this->$controllerProduct->showProduct();
        break;
    case 'about':
        $id = null;
        if (isset($params[1])) $id = $params[1];
        $this->$controllerProduct->showAbout($id);
        break;
    default:
        echo ('404 Page not found');
        break;
}
