<?php

require_once './views/productView.php';
require_once './models/productModel.php';
require_once './models/categoriesModel.php';

class MenuController

{
    private $view;
    private $pmodel;
    private $cmodel;

    function __construct()
    {
        $this->cmodel = new CategoriesModel;
        $this->pmodel = new ProductModel;
        $this->view = new ProductView;
    }


    function showMenu()

    {
        $categories = $this->cmodel->getAllCategories();
        $products = $this->pmodel->getAllProducts();
        $this->view->showMenu($categories, $products);
    }

    function showProductsByCategory($id)
    
    {
        $category = $this->cmodel->getCategoryById($id);
        $products = $this->pmodel->getProductsByCategory($id);
        if($products){
            $this->view->showCategory($category,$products);
        } else {
            $this->view->showError();
        }
    }
}
