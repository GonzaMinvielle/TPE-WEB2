<?php

require_once './views/abmView.php';
require_once './models/productModel.php';
require_once './models/categoriesModel.php';

class AbmController {

    private $view;

    function __construct() {
        $this->view = new HomeView();
    }

    /* function showAdmin() {
        $this->view->showAdmin();
    } */

    function showUpdate() {
        $this->view->showUpdate();
    }

}
