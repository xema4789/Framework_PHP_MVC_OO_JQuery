<?php 
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; //no me esta pillando bien el path y en consecuencia el include de despues
 include($path . "model/connect.php");
 class DAOCart{
    function ver_tipo($id){
        $sql = "SELECT Tipo_habitacion FROM Habitaciones  WHERE Numero_habitacion = $id";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function pintar_productos($ids){
        $sql = "SELECT * FROM Habitaciones WHERE Numero_habitacion IN ($ids)";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }



 }

?>