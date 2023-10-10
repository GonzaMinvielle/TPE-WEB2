<?php

require_once './libs/Smarty.class.php';

class HomeView{

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }


    public function showAbout(){
        $this->smarty->display('./templates/about.tpl');
    }

}