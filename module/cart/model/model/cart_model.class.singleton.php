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
        public function pintar_productos($items){
            // return $items;
            // die;
            return $this->bll->pintar_productos($items);
        }
        public function back_up_carrito($id){
            return $this->bll->back_up_carrito($id);
        }

        public function delete($id){
            return $this->bll->delete($id);
        }

        public function pintar_carrito_final($items){
            return $this->bll->pintar_carrito_final($items);
        }
        public function finalizar_compra($items){
            return $this->bll->finalizar_compra($items);
        }
    }

?>