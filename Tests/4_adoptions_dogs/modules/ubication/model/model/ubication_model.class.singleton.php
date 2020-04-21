<?php
	class ubication_model {
	    private $bll;
	    static $_instance;

	    private function __construct() {
	        $this->bll = ubication_bll::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }

	    public function load_location(){
	        return $this->bll->load_location_BLL();
	    }
	    public function load_prov(){
	        return $this->bll->load_prov_BLL();
	    }
	    public function details_list($arrArgument){
	        return $this->bll->details_list_BLL($arrArgument);
	    }
	}
