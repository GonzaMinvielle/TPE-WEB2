<?php

require_once 'models/productosModel.php';
require_once 'controller/productosController.php';

$controlador = new productosController();
$controlador->showAllProductos();
