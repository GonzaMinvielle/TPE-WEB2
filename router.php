
<?php
require_once "./controller/producto_controller.php";
require_once "./controller/categoria_controller.php";


$partesURL = explode('/', $_GET['action']);
$controller = new producto_controller();
$controllerEdit = new categoria_controller();


if ($partesURL[0] == '') {
    $controller->home();
} else {
    if ($partesURL[0] == 'agregar') {
        $controller->agregarNoticia();
    } elseif ($partesURL[0] == 'borrar') {
        $controller->borrarNoticia($partesURL[1]);
    } elseif ($partesURL[0] == 'editar') {
        $controllerEdit->editarNoticia($partesURL[1]);
    }
}
?>