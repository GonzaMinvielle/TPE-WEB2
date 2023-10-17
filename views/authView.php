<?php
class AuthView
{
    public function showLogin($error = null)
    {
        require './templates/login.phtml';
    }

    public function showError($error = null)
    {
        require_once './templates/error.phtml';
    }
}
