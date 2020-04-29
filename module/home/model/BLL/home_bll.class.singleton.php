<?php
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

    public function list_ciudades_valoracion($arrArgument){
        return $this->dao->list_ciudades_valoracion($this->db,$arrArgument);
    }


}
?>