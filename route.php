<?php
require_once  'libs/Apirouter.php';
require_once 'controllers/menuApiController.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$router = new Router();

$router->addRoute('productos', 'GET', 'menuApiController', 'getAllProducts');
$router->addRoute('productos', 'POST', 'menuApiController', 'addProduct');
$router->addRoute('productos/:ID', 'PUT', 'menuApiController', 'updateProduct');
$router->addRoute('productos/:ID', 'GET', 'menuApiController', 'getProductById');
$router->addRoute('productos/:sort_filter/:sort_mode', 'GET', 'menuApiController', 'getAllProducts');
$router->route($_GET['resource'], $_SERVER["REQUEST_METHOD"]);
