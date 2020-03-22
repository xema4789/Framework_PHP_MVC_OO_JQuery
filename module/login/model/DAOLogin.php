<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 
 include($path . "model/connect.php");
 
    class DAOLogin{
        function select_user($nombre){
            $sql = "SELECT u.user FROM Users u WHERE u.user LIKE $nombre";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
            connect::close($connection);
            return $res;
        }

        function insert_user($user,$passwd,$email){
            
            $sql = "INSERT INTO Users (user, password, email,type) VALUES ($user,$passwd,$email,'user')";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
            connect::close($connection);
            return $res;
        }
    }
?>