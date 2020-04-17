<?php
	class ubication_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = ubication_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }

	    public function load_location_BLL(){
	      return $this->dao->select_location($this->db);
	    }

	    public function load_prov_BLL(){
	      return $this->dao->load_prov();
	    }
	    
	    public function details_list_BLL($arrArgument){
	      return $this->dao->select_details_chip($this->db,$arrArgument);
	    }
	}
