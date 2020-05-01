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
        // return ("ESTOY EN EL DAO");
        // print_r($db);
        $sql="SELECT * FROM Habitaciones ORDER BY Valoracion DESC LIMIT 4";
        $stmt=$db->ejecutar($sql);
        return $db->listar($stmt);
    }
}
?>