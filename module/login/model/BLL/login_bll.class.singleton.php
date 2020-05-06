<?php
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/login/model/DAO/login_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");

class login_bll{
    private $dao;
    private $db;
    static $_instance;


    private function construct(){
        $this->dao=login_dao::getInstance();
        $this->db=db::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function insert_user($user){
        return $user;
        die;
        // return $this->dao->insert_user($user,$passwd,$email);
    }
}
?>