<?php

class ProductView
{



    public function showMenu($categories, $products)
    {
        require './templates/menu.phtml';
    }

    public function showProduct($product)
    {
        require './templates/product.phtml';
    }
    
    public function showCategory($category,$products)
    {
        require './templates/category.phtml';
    }


    public function showError()
    {
        require './templates/error.phtml';
    }
}
