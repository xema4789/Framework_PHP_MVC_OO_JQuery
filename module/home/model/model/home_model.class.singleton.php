<?php
class home_model{
    private $bll;
    static $_instance;

    private function __construct(){
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function list_ciudades_valoracion ($arrArgument){
        return $this->bll->list_ciudades_valoracion($arrArgument);

    }
}
?>