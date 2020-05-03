<?php
include ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/shop/model/BLL/shop_bll.class.singleton.php");

class shop_model{
    private $bll;
    static $_instance;
    function __construct(){
        $this->bll = shop_bll::getInstance();
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    
}

?>