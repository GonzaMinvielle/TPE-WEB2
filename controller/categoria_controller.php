<?php
require_once "./view/producto_view.php";
require_once "./model/producto_model.php";
class CategoriaController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new producto_view;
        $this->model = new producto_model;
    }
}
