<?php
// include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");
// include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/connect.php");

class Conf{
    private $_userdb;
    private $_passdb;
    private $_hostdb;
    private $_db;
    private $_instance;

    private function __construct(){
        // $cnfg = parse_ini_file(MODEL_PATH."db_ini");
        $this->_userdb="xema";
        $this->_passdb="@Mondongo99";
        $this->_hostdb="127.0.0.1";
        $this->_db="Hoteles";


        // $this->_userdb=$cnfg['user'];
        // $this->_passdb=$cnfg['pass'];
        // $this->_hostdb=$cnfg['host'];
        // $this->_db=$cnfg['db'];
    }
    private function __clone(){

    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getUserDB(){
        $var = $this->_userdb;
        return $var;
    }

    public function getHostDB(){
        $var = $this->_hostdb;
        return $var;
    }

    public function getPassDB(){
        $var = $this ->_passdb;
        return $var;
    }
    public function getDB(){
        $var=$this->_db;
        return $var;
    }



}

?>