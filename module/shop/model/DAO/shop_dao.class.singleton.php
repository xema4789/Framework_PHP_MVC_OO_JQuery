<?php
class shop_dao{
    static $_instance;

    private function __construct(){

    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_habitaciones($db){
        $sql='SELECT * FROM `Habitaciones` WHERE imagen LIKE "view%"';
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function list_paginacion($db,$offset){
        $sql="SELECT h.*, t.visitas FROM Tipos t INNER JOIN Habitaciones h WHERE t.Tipo = h.Tipo_habitacion ORDER BY t.visitas DESC LIMIT 9 OFFSET $offset";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function contar($db){
        return $db;
        $sql="SELECT COUNT(*) AS total FROM Habitaciones";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }

    
}
?>