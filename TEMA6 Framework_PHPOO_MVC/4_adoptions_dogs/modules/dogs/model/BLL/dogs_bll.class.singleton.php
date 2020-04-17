<?php
class dogs_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = dogs_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function create_dog_BLL($arrArgument){
      return $this->dao->create_dog_DAO($this->db, $arrArgument);
    }
    public function obtain_countries_BLL($url){
      return $this->dao->obtain_countries_DAO($url);
    }
    public function obtain_provinces_BLL(){
      return $this->dao->obtain_provinces_DAO();
    }
    public function obtain_cities_BLL($arrArgument){
      return $this->dao->obtain_cities_DAO($arrArgument);
    }
    public function nduplicate_chip_BLL($arrArgument){
      return $this->dao->nduplicate_chip_DAO($this->db, $arrArgument);
    }
    public function select_creator_BLL($arrArgument){
      return $this->dao->select_creator($this->db, $arrArgument);
    }
}
