<?php
class dogs_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = dogs_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
    public function create_dog($arrArgument) {
        return $this->bll->create_dog_BLL($arrArgument);
    }
    public function obtain_countries($url){
        return $this->bll->obtain_countries_BLL($url);
    }
    public function obtain_provinces(){
        return $this->bll->obtain_provinces_BLL();
    }
    public function obtain_cities($arrArgument){
        return $this->bll->obtain_cities_BLL($arrArgument);
    }
    public function nduplicate_chip($arrArgument){
        return $this->bll->nduplicate_chip_BLL($arrArgument);
    }
    public function select_creator($arrArgument){
        return $this->bll->select_creator_BLL($arrArgument);
    }
}