<?php 
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/';
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
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Ciudad LIKE \"$ciudad\"";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }


    function select_categorias($cat){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_habitacion LIKE  \"$cat\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    

    function filtrar($consulta){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE 1" . $consulta;
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


    function list_ciudad_tipos($tipo,$ciudad){ 
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Ciudad LIKE \"$ciudad\" AND h.Tipo_habitacion LIKE \"$tipo\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_comida($comida){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_comida LIKE '".$comida."%'";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_comida_ciudad($comida,$ciudad){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_comida LIKE '".$comida."%' AND h.Ciudad LIKE \"$ciudad\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_comida_ciudad_categoria($comida,$ciudad,$categoria){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_comida LIKE '".$comida."%' AND h.Ciudad LIKE \"$ciudad\" AND h.Tipo_habitacion LIKE \"$categoria\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_comida_categoria($comida,$categoria){
        $sql = "SELECT h.*, t.visitas FROM Habitaciones h INNER JOIN Tipos t ON h.Tipo_habitacion = t.Tipo WHERE h.Tipo_comida LIKE '".$comida."%' AND h.Tipo_habitacion LIKE \"$categoria\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_mas_visitados($num){
        $sql = "SELECT h.*, t.visitas FROM Tipos t INNER JOIN Habitaciones h WHERE t.Tipo = h.Tipo_habitacion ORDER BY t.visitas DESC LIMIT 3 OFFSET $num";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function sumar_visita($tipo){
        $sql = "UPDATE Tipos SET visitas=visitas+1 WHERE Tipo LIKE \"$tipo\" ";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    function contar(){
        $sql = "SELECT COUNT(*) AS total FROM Habitaciones";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function list_paginacion($offset){
        $sql = "SELECT h.*, t.visitas FROM Tipos t INNER JOIN Habitaciones h WHERE t.Tipo = h.Tipo_habitacion ORDER BY t.visitas DESC LIMIT 9 OFFSET $offset";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }
    function busca_like($id,$user){
        $sql = "SELECT * FROM Likes WHERE id_user LIKE '$user' AND id_habitacion = $id";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;


    }

    function insert_like($id_hab,$user){
        $sql = "INSERT INTO Likes (id_user, id_habitacion, fecha) VALUES ('$user',$id_hab,NOW())";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function dislike($id_hab,$user){
        
        $sql = "DELETE FROM Likes WHERE id_user LIKE '$user' AND id_habitacion = $id_hab";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;

    }

    function ver_likes(){
        $sql = "SELECT * FROM Likes";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;
    }

    function ver_habitacion_like($id,$user){
        
        $sql = "SELECT * FROM Likes WHERE id_habitacion = $id AND id_user LIKE '$user'";
        $connection = connect::con();
        $res = mysqli_query($connection, $sql);
        connect::close($connection);
        return $res;

    }
  
}