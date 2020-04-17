<?php
	class login_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = login_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }
	    
	    public function data_social_BLL($arrArgument){
	      return $this->dao->insert_data_social($this->db,$arrArgument);
	    }
	    public function insert_userp_BLL($arrArgument){
	      return $this->dao->insert_user_page($this->db,$arrArgument);
	    }
	    public function rid_social_BLL($arrArgument){
	      return $this->dao->select_rid_social($this->db,$arrArgument);
	    }
	    public function exist_user_BLL($arrArgument){
	      return $this->dao->select_exist_user($this->db,$arrArgument);
	    }
	    public function type_user_BLL($arrArgument){
	      return $this->dao->select_type_user($this->db,$arrArgument);
	    }
	    public function print_user_BLL($arrArgument){
	      return $this->dao->select_print_user($this->db,$arrArgument);
	    }
	    public function update_user_BLL($arrArgument){
	      return $this->dao->select_update_user($this->db,$arrArgument);
	    }
	    public function get_mail_to_BLL($arrArgument){
	      return $this->dao->select_get_mail_to($this->db,$arrArgument);
	    }
	    public function update_passwd_BLL($arrArgument){
	      return $this->dao->update_passwd($this->db,$arrArgument);
	    }
	    public function modify_avatar_BLL($arrArgument){
	      return $this->dao->update_avatar($this->db,$arrArgument);
	    }
	    public function print_dog_BLL($arrArgument){
	      return $this->dao->select_dog($this->db,$arrArgument);
	    }
	    public function print_adoption_BLL($arrArgument){
	      return $this->dao->select_adoption($this->db,$arrArgument);
	    }
	    public function conceal_dog_BLL($arrArgument){
	      return $this->dao->conceal_dog($this->db,$arrArgument);
	    }
	    public function visible_dog_BLL($arrArgument){
	      return $this->dao->visible_dog($this->db,$arrArgument);
	    }
	}