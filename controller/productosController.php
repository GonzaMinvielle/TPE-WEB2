<?php
require_once './views/productosView.php';
require_once './models/productosModel.php';
class productosController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new ProductosModel;
        $this->view = new ProductosView;
    }

    // function showProduct()
    //{
    //  $this->view->showProduct;
    //}

    function showAllProductos()
    {
        $productos = $this->model->getAll();


        $this->view->showAllProductos($productos);
    }
}
