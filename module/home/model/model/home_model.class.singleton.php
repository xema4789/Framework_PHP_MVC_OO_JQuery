<?php

include ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/home/model/BLL/home_bll.class.singleton.php");


class home_model{
    private $bll;
    static $_instance;

    function __construct(){
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_ciudades_valoracion(){
        return $this->bll->list_ciudades_valoracion();
    }
}
?>