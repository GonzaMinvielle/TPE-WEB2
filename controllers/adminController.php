<?php

require_once './views/UserView.php';
require_once './models/UserModel.php';
require_once './helpers/authHelper.php';
require_once './views/authView.php';

class AdminController
{
    private $view;
    private $model;
    private $error;

    function __construct()
    {
        $this->error = new AuthView;
        $this->view = new UserView;
        $this->model = new UserModel;
    }
    public function showLogin()
    {

        $this->view->showLogin();
    }
}
