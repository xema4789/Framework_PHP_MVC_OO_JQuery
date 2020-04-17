<?php
class adoptions_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_data_list($db,$arrArgument,$arrArgument2) {
        $sql = "SELECT name,chip,breed,sex,stature,picture,date_birth FROM dogs WHERE breed LIKE '%$arrArgument%' AND state = 0 ORDER BY chip LIMIT $arrArgument2,6";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_data_details($db,$arrArgument) {
        $sql = "SELECT name,chip,breed,sex,stature,picture,date_birth,tlp,country,province,city,cinfo,dinfo FROM dogs WHERE chip = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_number_breeds($db,$arrArgument) {
        $sql = "SELECT COUNT(*) as num FROM dogs WHERE breed LIKE '%$arrArgument%' AND state = 0";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    
    public function select_all_breeds($db) {
        $sql = "SELECT DISTINCT breed as breeds FROM dogs WHERE state = 0";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    
    public function select_user($db,$arrArgument) {
        $sql = "SELECT IDuser FROM users WHERE token = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    
    public function insert_adoption($db,$arrArgument,$arrArgument2) {
        $token = md5(uniqid(rand(),true));
        $sql = "INSERT INTO adoption VALUES ('$token','$arrArgument','$arrArgument2')";
        return $db->ejecutar($sql);
    }
    
    public function update_value($db,$arrArgument) {
        $sql = "UPDATE dogs SET state = 1 WHERE chip = '$arrArgument'";
        return $db->ejecutar($sql);
    }

}
