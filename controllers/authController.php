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

    public function registered()
    {
        //si no esta vacio ningun campo, agarro los datos del form
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $_POST['email'];
            //hasheo la contraseña 
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            //guardo el usuario y el hash del password en la base de datos
            $this->model->registeredUser($user, $password);
            header("Location:" . BASE_URL);
        } else {
            //si no lo redirijo al home
            header("Location:" . BASE_URL);
        }
    }
    public function logged()
    {
        $user = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($user) || !empty($password)) {
            //si no estan vacios los datos, busco el usuario
            $userDB = $this->model->getUserByEmail($user);

            //verifico si las credenciales son validas
            if ($userDB && password_verify($password, $userDB->password)) {
                //si son validas, logueo al usuario
                AuthHelper::login($userDB);
                header("Location:" . BASE_URL . 'admin');
            } else {
                $this->view->showError('El usuario y a contraseña no coinciden con los datos de la DB');
            }
        }
    }

    public function showRegister()
    {
        $this->view->register();
    }
}
