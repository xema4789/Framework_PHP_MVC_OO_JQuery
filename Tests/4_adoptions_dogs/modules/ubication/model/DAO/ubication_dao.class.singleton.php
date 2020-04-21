<?php
class ubication_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_location($db) {
        $sql = "SELECT chip,name,breed,tlp,sex,picture,city,lat,longit,province FROM dogs ORDER BY city";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function load_prov() {
        $json = array();
        $tmp = array();
        $provincias = simplexml_load_file(RESOURCES .'/provinciasypoblaciones.xml');
        $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
        for ($i=0; $i<count($result); $i+=2) {
            $e=$i+1;
            $provincia=$result[$e];
            $tmp = array(
              'id' => (string) $result[$i], 'nombre' => (string) $provincia
            );
            array_push($json, $tmp);
        }
        return $json;
    }

    public function select_details_chip($db,$arrArgument) {
        $sql = "SELECT name,chip,breed,sex,stature,picture,date_birth,tlp,country,province,city,cinfo,dinfo FROM dogs WHERE chip = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

}
