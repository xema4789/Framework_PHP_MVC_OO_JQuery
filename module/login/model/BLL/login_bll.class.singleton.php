<?php
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/login/model/DAO/login_dao.class.singleton.php");
include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/db.class.singleton.php");

class login_bll{
    private $dao;
    private $db;
    static $_instance;


    private function __construct(){
        $this->dao=login_dao::getInstance();
        $this->db=db::getInstance();
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function register($datos,$token){
        $email=$datos['email'];
        $nombre=$datos['nombre'];
        $passwd=$datos['password'];
        return $this->dao->insert_user($this->db,$nombre,$passwd,$email,$token);
    }

    public function validate_token($token){
        $user= $this->dao->validate_token($this->db,$token);
        if($user){
            return $this->dao->active_user($this->db,$token); 
        }
        return "no";
    }

    public function login($user){
        $nombre=$user['nombre'];
        $passwd=$user['password'];
        return $this->dao->login($this->db,$nombre,$passwd);

    }
    public function recover_passwd($user){
        return $this->dao->recover_passwd($this->db,$nombre);
    }
}
?>