<?php
<<<<<<< HEAD
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
=======

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
>>>>>>> ccc0d695140f57f2b8b64496f0dad71ea6770c40
