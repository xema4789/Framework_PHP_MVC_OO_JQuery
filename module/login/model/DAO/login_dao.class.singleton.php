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
        function login($db,$nombre,$passwd){
            $sql="SELECT * FROM Users WHERE user LIKE '$nombre'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
        function recover_passwd($db,$user){
            $sql="SELECT * FROM Users WHERE user LIKE '$user'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);
        }
        function change_passwd($db,$passwd,$token){
            $passwd=login_dao::encriptar($passwd);
            $token_new=bin2hex(openssl_random_pseudo_bytes((20 - (20 % 2)) / 2));
            $sql="UPDATE Users u SET u.password='$passwd', u.token='$token_new' WHERE u.token='$token'";
            $stmt=$db->ejecutar($sql);
            return $db->listar($stmt);

        }




        
    }
?>