<?php 
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; //no me esta pillando bien el path y en consecuencia el include de despues
 include($path . "model/connect.php");

 class DAOHome{
    function select_all_tipos(){
        $sql = "SELECT DISTINCT Tipo_habitacion FROM Habitaciones";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    function list_imagenes(){
        $sql = "SELECT * FROM Carousel";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_ciudades_valoracion(){
        $sql = 'SELECT * FROM Habitaciones ORDER BY Valoracion DESC LIMIT 4';
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }


    function select_habitacion($num){
        $sql = "SELECT * FROM Habitaciones WHERE Numero_habitacion = $num";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_tipos(){
        $sql = "SELECT * FROM Tipos";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    function list_ciudades(){
        $sql = "SELECT DISTINCT Ciudad, imagen FROM Habitaciones";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
}