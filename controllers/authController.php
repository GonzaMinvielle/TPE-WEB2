<?php

require_once './views/authView.php';
require_once './helpers/authHelper.php';
require_once './models/userModel.php';

class AuthController
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new AuthView;
        $this->model = new UserModel;
    }

    public function auth()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {


            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user->password)) {
                AuthHelper::login($user);
                echo 'asdasd';
                header('Location: ' . BASE_URL . 'home');
                return;
            } else {
                $this->view->showError('Falta completar datos');
                return;
            }
        }
    }
}
