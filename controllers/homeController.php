<?php

require_once './views/homeView.php';

class HomeController {

    private $view;

    function __construct() {
        $this->view = new HomeView();
    }

    function showHome() {
        $this->view->showHome();
    }
}
