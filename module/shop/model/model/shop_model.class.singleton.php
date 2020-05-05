<?php
include ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/shop/model/BLL/shop_bll.class.singleton.php");

class shop_model{
    private $bll;
    static $_instance;

    function __construct(){ //Si pongo __ me coge la clase y puedo llamar a la funcion, pero en el common cuando hago $obj = $modelClass::getInstance(); ME PETA. Si no le pongo __ al principio, no me peta el common, pero entonces la variable bll no coge el get instance y no puedo llamar a la funcion
        $this->bll = shop_bll::getInstance();
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_habitaciones(){
        return $this->bll->list_habitaciones();
    }
    public function list_paginacion($arrgument){
        return $this->bll->list_paginacion($arrgument);
    }
    public function contar(){
        return "MODEL CONTAR";
        die;
        return $this->bll->contar();
    }

    
}

?>