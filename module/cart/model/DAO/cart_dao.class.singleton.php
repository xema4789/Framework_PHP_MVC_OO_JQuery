<?php

    class cart_dao{
        static $_instance;

        private function __construct(){

        }


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
        public function back_up_carrito($db,$id){
            $user=$_SESSION['user'];
            $sql = "INSERT INTO Carrito_backup(Id, Usuario, cantidad) VALUES ($id,'$user',0)";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function pintar_productos($db,$ids){
            $ids = implode(",", $ids);
            $sql = "SELECT h.*, c.cantidad FROM Habitaciones h INNER JOIN Carrito_backup c ON h.Numero_habitacion=c.Id WHERE h.Numero_habitacion IN ($ids)";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
        public function delete($db,$id){
            $user=$_SESSION['user'];
            $sql = "DELETE FROM Carrito_backup WHERE Usuario LIKE '$user' AND Id = $id";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
        public function pintar_carrito_final($db,$ids){
            $ids=implode(",",$ids);
            $sql = "SELECT t.Tipo, h.imagen, t.precio, h.Numero_habitacion, c.cantidad FROM Tipos t INNER JOIN Habitaciones h ON t.Tipo = h.Tipo_habitacion INNER JOIN Carrito_backup c ON h.Numero_habitacion = c.Id WHERE h.Numero_habitacion IN ($ids)";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
        public function finalizar_compra($db,$datos){
            $user=$_SESSION['user'];
            for ($i = 0; $i < sizeof($datos['ids']); $i++){
                $sql = "INSERT INTO Carrito (id_habitacion, Tipo, Cantidad, Precio_total, usuario) VALUES (".$datos['ids'][$i].",'".$datos['tipos'][$i]."','".$datos['cantidades'][$i]."',".$datos['precios'][$i].",'$user')";
                $stmt=$db->ejecutar($sql);
            }

            
            return $db->listar($stmt);
        }
    }

?>