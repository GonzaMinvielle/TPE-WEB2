<?php

class AboutController
{
    private $view;

    function __construct()
    {
        $this->view = new AboutView();
    }

    function showAbout()
    {

        $this->view->showAbout();
    }
}
