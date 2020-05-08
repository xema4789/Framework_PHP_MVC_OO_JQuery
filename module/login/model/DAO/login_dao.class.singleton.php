<?php
    class login_dao{
        static $_instance;

        function encriptar($password) {
            return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        }
        function verify_passwd($password, $hash) {
            return password_verify($password,$hash);
        }

        public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        function insert_user($db,$nombre,$passwd,$email,$token){
            $passwd_encript=login_dao::encriptar($passwd);
            $sql = "INSERT INTO Users (user, password, email,type,active,token) VALUES ('$nombre','$passwd_encript','$email','user','false','$token')";
            $stmt=$db->ejecutar($sql);
            return 'okay'; 
        }
        function validate_token($db,$token){
            $sql="SELECT * FROM Users WHERE token='$token'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function active_user($db,$token){
            $sql="UPDATE Users SET active='true' WHERE token='$token'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }




        
    }
?>