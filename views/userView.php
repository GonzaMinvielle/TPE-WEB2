<?php

class UserView
{

    public function showLogin()
    {

        require './templates/login.phtml';
    }

    public function showAdmin($products)
    {
        require './templates/admin.phtml';
    }

    public function showError()
    {
        require './templates/error.phtml';
    }
    public function showUpdate($product)

    {
        require './templates/editar.phtml';
    }
}
