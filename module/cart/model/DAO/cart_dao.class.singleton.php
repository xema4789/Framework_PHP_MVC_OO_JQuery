<?php

    class cart_dao{
        static $_instance;


        public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function pintar_prods_bd($db){
            $user=$_SESSION['user'];
            $sql = "SELECT * FROM Carrito_backup WHERE Usuario LIKE '$user'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
    }

?>