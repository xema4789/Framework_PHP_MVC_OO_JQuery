<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 
 include($path . "model/connect.php");
 
    class DAOLogin{

       
        function encriptar($password) {
            return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        }
        function verify_passwd($password, $hash) {
            return password_verify($password, $hash);
        }






        function select_user($nombre){
            $sql = "SELECT * FROM Users  WHERE user LIKE '$nombre'";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
            connect::close($connection);
            return $res;
        }

        function insert_user($user,$passwd,$email){
            $passwd_encript=DAOLogin::encriptar($passwd);
            // $passwd_encript=DAOLogin::encriptar($passwd_encript);
            
            $sql = "INSERT INTO Users (user, password, email,type) VALUES ('$user','$passwd_encript','$email','user')";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
            if(!$res){
                echo (mysqli_error($connection));
            }
            connect::close($connection);
            return $res;
        }

        function login_user($user,$passwd){

            $sql = "SELECT * FROM Users WHERE user LIKE '$user'";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
            connect::close($connection);

            $pass_hash=$res['password'];

            if(DAOLogin::verify_passwd($passwd,$pass_hash)){
                return $res;
            }else{
                return $res;
            }

            // return $res;
            // $user_passwd= $res['password'];
            // $hash_passwd= array_column($res[0], 'password'); //Tengo el error aqui

            // if(DAOLogin::verify_passwd($passwd, $hash_passwd)){
            //     return $res;
            // }else{
            //     return false;
            // }








            

            
        }
    }




?>