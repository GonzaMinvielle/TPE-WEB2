<?php

require_once './models/productModel.php';
require_once './helpers/authHelper.php';
require_once './views/productView.php';
require_once './models/categoriesModel.php';
require_once './views/productView.php';

class AdminController
{
    private $model;
    private $view;
    private $AdminView;
    private $modelCategories;
    private $categoryView;


    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new AuthView();
        $this->modelCategories = new CategoriesModel();
    }

    public function showListProds()
    {
        $products = $this->model->getAllProducts();
        if (!empty($products)) {
            require_once 'templates/product.phtml';
        } else {
            $this->view->showError('No hay productos disponibles');
        }
    }



    public function showAllUpdatedProduct()
    {
        $products = $this->model->getAllProducts();
        if (!empty($products)) {
            require_once './templates/editar.phtml';
        } else {
            $this->view->showError('No se pudo actualizar el producto');
        }
    }

    public function showDescriptionProductUpdated($id)
    {
        $product = $this->model->getProductById($id);
        if (!empty($product)) {
            require_once './templates/menu.phtml';
        } else {
            $this->view->showError('No se pudo actualizar el producto');
        }
    }
}
