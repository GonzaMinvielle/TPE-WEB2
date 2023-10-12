<?php
require_once './views/productView.php';
require_once './models/productModel.php';
class ProductController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new ProductModel;
        $this->view = new ProductView;
    }


    function showAllProductos()

    {
        $products = $this->model->getAll();
        $this->view->showAllProducts($products);
    }
}
