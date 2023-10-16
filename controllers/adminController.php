<?php

require_once './views/UserView.php';
require_once './models/UserModel.php';

class AdminController
{
    private $view;
    private $model;


    function __construct()
    {
        $this->view = new UserView;
        $this->model = new UserModel;
    }

    protected function checkLoggedIn(){
        if(empty($_SESSION['name'])){
            header('Location: ' . BASE_URL);
            die();
        }
    }


    function showLogIn()

    {
        $this->view->showLogin();
    }

}
