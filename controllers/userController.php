<?php

require_once './views/UserView.php';
require_once './views/ProductView.php';
require_once './models/userModel.php';
require_once './helpers/authHelper.php';
require_once './views/authView.php';
class UserController
{
    private $view;
    private $pview;
    private $model;
    private $pmodel;



    function __construct()
    {
        $this->pview = new ProductView();
        $this->view = new UserView;
        $this->model = new UserModel;
        $this->pmodel = new ProductModel;
    }

    public function showLogin()
    {

        $this->view->showLogin();
    }

    public function showAdmin()

    {
        $products = $this->pmodel->getAllProducts();
        $this->view->showAdmin($products);
    }

    public function auth()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

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
