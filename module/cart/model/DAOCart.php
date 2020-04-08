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

    function pintar_carrito_final($ids){
        $sql = "SELECT t.Tipo, h.imagen, t.precio, h.Numero_habitacion FROM Tipos t INNER JOIN Habitaciones h ON t.Tipo = h.Tipo_habitacion WHERE h.Numero_habitacion IN ($ids)";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function finalizar_compra($datos){
        $user=$_SESSION['user'];



        for ($i = 0; $i < sizeof($datos['ids']); $i++){

            
            
            $sql = "INSERT INTO Carrito (id_habitacion, Tipo, Cantidad, Precio_total, usuario) VALUES (".$datos['ids'][$i].",'".$datos['tipos'][$i]."',1,".$datos['precios'][$i].",'$user')";
            $connection = connect::con();
            $res = mysqli_query($connection, $sql);
        }
            connect::close($connection);
            return $res;

        // foreach($datos as $valor){
        //     print_r($datos);
           
            // $sql = "INSERT INTO Carrito (id_habitacion, Tipo, Cantidad, Precio_total, usuario) VALUES ($valor[ids][0],'$valor[tipos][0]',1,$valor[precios][0],'$user')";
            // $connection = connect::con();
            // $res = mysqli_query($connection, $sql);
            // connect::close($connection);
            // return $res;
        // }




        
    }


    function back_up_carrito($id){
        $user=$_SESSION['user'];
        $sql = "INSERT INTO Carrito_backup(Id, Usuario) VALUES ($id,'$user')";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function pintar_prods_bd(){
        $user=$_SESSION['user'];
        $sql = "SELECT * FROM Carrito_backup WHERE Usuario LIKE '$user'";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }



 }

?>