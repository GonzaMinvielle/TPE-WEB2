<?php

class ProductView
{



    public function showMenu($categories, $products)
    {
        require './templates/menu.phtml';
    }

    public function showProductsByCategory($products)
    {
        require './templates/category.phtml';
    }

    public function showError()
    {
        require './templates/error.phtml';
    }
}
