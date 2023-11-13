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
            require_once 'templates/products.phtml';
        } else {
            $this->view->showError('No hay productos disponibles');
        }
    }

    public function showFormAddProduct()
    {
        require_once 'templates/add_product_admin.phtml';
    }

    public function showDeleteProds()
    {
        $products = $this->model->getAllProducts();

        if (!empty($products)) {
            require_once 'templates/delete_products_admin.phtml';
        } else {
            $this->view->showError('No hay productos para eliminar');
        }
    }




    public function categoriesForm()
    {
        require_once './templates/add_product_with_category.phtml';
    }

    public function addProduct()
    {

        $name = $_POST['name'];
        $category = $_POST['type'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        if (!empty($img) || !empty($name) || !empty($description) || !empty($price) || !empty($category)) {
            $this->model->addProduct($name, $category, $price, $description, $img);
            header("Location:" . BASE_URL);
        } else {
            $this->view->showError('No se pudo añadir el producto');
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
            require_once './templates/description_product_admin.phtml';
        } else {
            $this->view->showError('No se pudo actualizar el producto');
        }
    }

    /*public function updateProduct($name, $description, $price, $id)
    {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id = $_POST['id'];


        if (!empty($name) || !empty($description) || !empty($price) || !empty($id)) {
            $this->model->updateProduct($name, $description, $price, $id);
            header("Location:" . BASE_URL);
        } else {
            $this->view->showError('No se pudo actualizar');
        }
    }*/
}
