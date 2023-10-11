<?php
require_once './controller/productosController.php';

class ProductosView
{


    public function showAllProductos($productos)
    {
        $count = count($productos);
        echo "<h1>Lista de Productos</h1>";


        require './templates/productosList.phtml';
    }
}
