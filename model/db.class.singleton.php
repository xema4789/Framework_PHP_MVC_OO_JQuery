<?php
// include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/Conf.class.singleton.php");
// include("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/connect.php");

class db{
    private $server;
    private $user;
    private $password;
    private $database;
    private $link;
    private $stmt;
    private $array;
    static $_instance;

    private function __construct(){
        $this->setConexion();
        $this->conectar();
    }

    private function setConexion(){
        // require_once ("/var/www/html/Programacion/Tema5_1.0/Tema5_1.0/Framework/model/Conf.class.singleton.php"); //Aqui hay gato encerrado...
        // $conf = Conf::getInstance();

        $this->server = "127.0.0.1";
        $this->database = "Hoteles";
        $this->user = "xema";
        $this->password = "@Mondongo99";

        // $this->server = $conf->getHostDB();
        // $this->database = $conf->getDB();
        // $this->user = $conf->getUserDB();
        // $this->password = $conf->getPassDB();
    }

    private function __clone(){

    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function conectar(){
        $this->link = new mysqli($this->server, $this->user, $this->password);
        $this->link->select_db($this->database);
    }
    public function ejecutar($sql){
        $this->stmt = $this->link->query($sql);
        return $this->stmt;
    }
    public function listar($stmt){
        // $this->array=array();
        // while($row=$stmt->fetch_array(MYSQLI_ASSOC)){
        //     array_push($this->array,$row);
        // }

        $this->array = array();
            foreach ($stmt as $row) {
                array_push($this->array, $row);
            }
            // echo json_encode($dinfo);
        return $this->array;
    }
}
?>