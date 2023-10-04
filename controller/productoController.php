<?php

class ProductoController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new ProductoModel();

        $this->view = new ProductoView();
    }

    function showHome()
    {

        $this->view->showHome();
    }
}
