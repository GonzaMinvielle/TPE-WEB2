<?php

require_once './views/UserView.php';
require_once './models/UserModel.php';
require_once './helpers/authHelper.php';

class AdminController
{
    private $view;
    private $model;


    function __construct()
    {
        $this->view = new UserView;
        $this->model = new UserModel;
    }
    public function showLogin()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        $email = $_POST['email'];
        $password = $$_POST['password'];

        if (empty($email) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        //busco usuario

        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            AuthHelper::login($user);

            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('usuario no valido');
        }
    }




    public function logout()
    {
        AuthHelper::logout();

        header('Location' . BASE_URL);
    }
}
