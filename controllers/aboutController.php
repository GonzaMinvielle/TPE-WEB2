<?php
require_once './views/aboutView.php';
require_once './helpers/authHelper.php';

class AboutController
{
    private $view;

    public function __construct()
    {
        session_start();
        $this->view = new AboutView();
    }

    public function showAbout()
    {
        $this->view->showAbout();
    }
}
