<?php

class UserView
{

    public function showLogin()
    {
        require './templates/login.phtml';
    }

    public function showError()
    {
        require './templates/error.phtml';
    }
}
