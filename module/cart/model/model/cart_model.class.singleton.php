<?php

include ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/cart/model/BLL/cart_bll.class.singleton.php");

    class cart_model{
        private $bll;
        static $_instance;
    
        function __construct(){
            $this->bll = cart_bll::getInstance();
        }

        public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function pintar_prods_bd(){
            return $this->bll->pintar_prods_bd();
        }
        public function pintar_productos(){
            return $this->bll->pintar_productos();
        }
    }

?>