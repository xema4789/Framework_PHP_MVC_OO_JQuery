<?php
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/shop/model/DAO/shop_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");

class shop_bll{
    private $dao;
    private $db;
    static $_instance;


    private function construct(){
        $this->dao = shop_dao::getInstance();
        $this->db::getInstance();
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


}

?>