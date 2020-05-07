<?php
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/login/model/DAO/login_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");

class login_bll{
    private $dao;
    private $db;
    static $_instance;


    private function __construct(){
        $this->dao=login_dao::getInstance();
        $this->db=db::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function register($datos){
        // return "PENE";
        // die;
        $email=$datos['email'];
        $nombre=$datos['nombre'];
        $passwd=$datos['password'];
        return $this->dao->insert_user($this->db,$nombre,$passwd,$email);
    }
}
?>