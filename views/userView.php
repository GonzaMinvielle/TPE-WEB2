<?php

class UserView
{
    
    public function showLogIn()
    {
        require './templates/login.phtml';
    }

    public function showError()
    {
        require './templates/error.phtml';
    }
}
