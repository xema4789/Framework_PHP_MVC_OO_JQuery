<?php
include ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/login/model/BLL/login_bll.class.singleton.php");

class login_model{
    private $bll;
    static $_instance;

    function __construct(){
        $this->bll= login_bll::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function register($datos,$token){
        return $this->bll->register($datos,$token);
    }

    public function validate_token($token){
        return $this->bll->validate_token($token);
    }
    public function login($user){
        return $this->bll->login($user);
    }
    public function recover_passwd($user){
        return $this->bll->recover_passwd($user);
    }
}


?>