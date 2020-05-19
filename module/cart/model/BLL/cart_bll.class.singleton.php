<?php

include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/cart/model/DAO/cart_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");

    class cart_bll{
        private $dao;
        private $db;
        static $_instance;

        private function __construct(){
            $this->dao = cart_dao::getInstance();
            $this->db=db::getInstance();
        }

        public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function pintar_prods_bd(){
            return $this->dao->pintar_prods_bd($this->db);
        }
        public function pintar_productos($items){
            // return $items;
            // die;
            return $this->dao->pintar_productos($this->db,$items);
        }
        public function back_up_carrito($id){
            return $this->dao->back_up_carrito($this->db,$id);
        }
        public function delete($id){
            return $this->dao->delete($this->db,$id);
        }
        public function pintar_carrito_final($items){
            return $this->dao->pintar_carrito_final($this->db,$items);
        }
        public function finalizar_compra($items){
            return $this->dao->finalizar_compra($this->bd,$items);
        }
    }

?>