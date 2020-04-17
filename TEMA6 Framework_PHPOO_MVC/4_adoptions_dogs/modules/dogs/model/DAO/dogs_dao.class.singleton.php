<?php
class dogs_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function create_dog_DAO($db, $arrArgument) {
        $name = $arrArgument['dname'];
        $chip = $arrArgument['dchip'];
        $breed = $arrArgument['breed'];
        $tlp = $arrArgument['dtlp'];
        $birth = $arrArgument['date_birth'];
        $regis = $arrArgument['date_regis'];
        $cinfo = $arrArgument['cinfo'];
        $sex = $arrArgument['sex'];
        $stature = $arrArgument['stature'];
        $country = $arrArgument['country'];
        $province = $arrArgument['province'];
        $city = $arrArgument['city'];
        $dinfo = $arrArgument['dinfo'];
        $pic = $arrArgument['dogpic'];
        $owner = $arrArgument['id_user'];
        $allcinfo = '';

        for ($i=0; $i < count($cinfo); $i++) { 
          if (count($cinfo) -1 === $i) {
            $allcinfo .= "$cinfo[$i]";
          }else{
            $allcinfo .= "$cinfo[$i],";
          }
        }
        
        $sql = "INSERT INTO dogs (name, chip, breed, tlp, date_birth, date_regis, cinfo, sex, stature, country, province, city, dinfo, picture,lat,longit,state,owner,fecha) VALUES ('$name', '$chip', '$breed', $tlp, '$birth', '$regis', '$allcinfo', '$sex', '$stature', '$country', '$province', '$city','$dinfo','$pic','38.8230534', '-0.5545122',0, '$owner', now())";
        return $db->ejecutar($sql);
    
    }

    public function obtain_countries_DAO($url){
          $ch = curl_init();
          curl_setopt ($ch, CURLOPT_URL, $url);
          curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
          $file_contents = curl_exec($ch);

          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          $accepted_response = array(200, 301, 302);
          if(!in_array($httpcode, $accepted_response)){
            return FALSE;
          }else{
            return ($file_contents) ? $file_contents : FALSE;
          }
    }
    
    public function obtain_provinces_DAO(){
      $json = array();
      $tmp = array();

      $provincias = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/resources/provinciasypoblaciones.xml');
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
    
    public function obtain_cities_DAO($arrArgument){
          $json = array();
          $tmp = array();

          $filter = (string)$arrArgument;
          $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/resources/provinciasypoblaciones.xml');
          $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

          for ($i=0; $i<count($result[0]); $i++) {
              $tmp = array(
                'poblacion' => (string) $result[0]->localidad[$i]
              );
              array_push($json, $tmp);
          }
          return $json;
    }

    public function nduplicate_chip_DAO($db,$arrArgument){
        $sql = "SELECT chip FROM dogs WHERE chip = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_creator($db,$arrArgument){
        $sql = "SELECT IDuser FROM users WHERE token = '$arrArgument'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    
}
