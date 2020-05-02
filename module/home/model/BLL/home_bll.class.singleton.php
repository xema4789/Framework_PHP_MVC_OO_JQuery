<?php

include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/home/model/DAO/home_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");//Me falla el include


class home_bll{
    private $dao;
    private $db;
    static $_instance;


    private function __construct(){
        $this->dao = home_dao::getInstance();
        $this->db=db::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_ciudades_valoracion(){
        return $this->dao->list_ciudades_valoracion($this->db);
    }
    public function list_tipos(){
        return $this->dao->list_tipos($this->db);
    }
    public function list_ciudades(){
        return $this->dao->list_ciudades($this->db);
    }
    public function list_visitas($num){
        return $this->dao->list_visitas($this->db,$num);
    }


}
?>