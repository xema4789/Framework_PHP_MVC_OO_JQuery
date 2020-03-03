<?php 
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
 include($path . "model/connect.php");

 class DAOShop{
    function list_habitaciones(){
        $sql = 'SELECT * FROM `Habitaciones` WHERE imagen LIKE "view%"';
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
    function select_all_tipos(){
        $sql = "SELECT * FROM Tipos";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_por_ciudad($ciudad){
        $sql = "SELECT * FROM Habitaciones WHERE Ciudad LIKE \"$ciudad\"";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }


    function select_categorias($cat){
        $sql = "SELECT * FROM Habitaciones WHERE Tipo_habitacion LIKE  \"$cat\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    

    function filtrar($consulta){
        $sql = "SELECT * FROM Habitaciones WHERE 1" . $consulta;
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }



    function maps(){
        $sql = "SELECT * FROM Ciudades";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
  
}