<?php
class HomeView
{

    public function showHome()
    {
        require './templates/showHome.phtml';
    }

    public function showError($error)
    {
        require './templates/error.phtml';
    }
}
