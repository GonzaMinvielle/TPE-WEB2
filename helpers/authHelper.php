<?php

class AuthHelper
{

    /* public static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
*/
    public static function login($user)
    {
        // AuthHelper::init();
        session_start();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['LOGGED'] = true;
        $_SESSION['USER_EMAIL'] = $user->email;
    }



    public static function logout()
    {
        //inicio la session
        //AuthHelper::init();
        //session_start();
        //destruyo la session
        session_destroy();
        header('Location: ' . BASE_URL);
    }

    public static function verify()
    {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'home');
            die();
        }
    }
}
