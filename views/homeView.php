<?php

require_once './libs/Smarty.class.php';

class HomeView{

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }


    public function showHome(){
        $this->smarty->display('./templates/home.tpl');
    }

}