<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/';
 include($path . "model/connect.php");


 class DAOSearch{
     function list_ciudad($ciudad){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Ciudad LIKE \"$ciudad\"";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
     }
     function list_ciudades(){
      $sql = "SELECT DISTINCT Ciudad FROM Habitaciones";
      $connection = connect::con();
      $res = mysqli_query($connection, $sql);
      connect::close($connection);
      return $res;
   }

     function list_tipo($tipo){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_habitacion LIKE  \"$tipo\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
     }
     function list_categorias(){
      $sql = "SELECT DISTINCT Tipo_habitacion FROM Habitaciones";
      $connection = connect::con();
      $res = mysqli_query($connection, $sql);
      connect::close($connection);
      return $res;
   }

     function autocomplete(){
      $ciudad = $_POST['drop1'];
      $tipo = $_POST['drop2'];
      $comida = $_POST['auto'];
      $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Ciudad LIKE \"$ciudad\" AND h.Tipo_habitacion LIKE \"$tipo\" AND h.Tipo_comida LIKE '".$comida."%'";
      $connection = connect::con();
      $res = mysqli_query($connection, $sql);
      connect::close($connection);
      return $res;
     }
 }

?>