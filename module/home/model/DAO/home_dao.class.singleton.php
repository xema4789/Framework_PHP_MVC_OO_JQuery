<?php

class home_dao{
    static $_instance;

    private function __construct(){

    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_ciudades_valoracion($db){
        $sql="SELECT * FROM Habitaciones ORDER BY Valoracion DESC LIMIT 4";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function list_tipos($db){
        $sql="SELECT * FROM Tipos";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function list_ciudades($db){
        $sql="SELECT DISTINCT Ciudad, imagen FROM Habitaciones";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function list_visitas($db,$num){
        $sql="SELECT h.*, t.visitas FROM Tipos t INNER JOIN Habitaciones h WHERE t.Tipo = h.Tipo_habitacion ORDER BY t.visitas DESC LIMIT 3 OFFSET $num";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }

}
?>