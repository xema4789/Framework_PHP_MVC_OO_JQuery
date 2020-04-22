 <?php 
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/'; //no me esta pillando bien el path y en consecuencia el include de despues
 include($path . "model/connect.php");
 
 class DAOorder{
     function select_order(){
         $sql = "SELECT Numero_habitacion,Tipo_habitacion,email,Fecha_entrada FROM Habitaciones";
         $connection = connect::con();
         $res = mysqli_query($connection, $sql);
         connect::close($connection);
         return $res;
     }
 }