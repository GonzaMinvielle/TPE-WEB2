<?php

require_once './views/homeView.php';

class HomeController
{

    private $view;

    function __construct()
    {
        session_start();
        $this->view = new HomeView();
    }

    function showHome()
    {
        $this->view->showHome();
    }

    function showAbout() {
        $this->view->showAbout();
    }

}
