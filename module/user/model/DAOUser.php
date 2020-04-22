<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/';
	include($path . "model/connect.php");
    
	class DAOUser{
		function insert_user($datos){
			$num_habitacion=$datos['num_habitacion'];
        	$tipo_habitacion=$datos['tipo_habitacion'];  
        	$tipo_comida=$datos['tipo_comida'];
        	$email=$datos['email'];
        	$pass=$datos['pass'];
        	$f_ini=$datos['f_ini'];
			$f_fin=$datos['f_fin'];
			$piscina=$datos['piscina'];
			$mayordomo=$datos['mayordomo'];    
			$ciudad=$datos['ciudad'];
			$valoracion=$datos['valoracion'];
			$imagen=$datos['imagen'];

        	$sql = " INSERT INTO Habitaciones (`Tipo_habitacion`, `Numero_habitacion`,`Ciudad`, `Valoracion`, `Tipo_comida`, `email`, `Contrasenya`, `Fecha_entrada`, `Fecha_salida`,`Piscina`,`Mayordomo`,`imagen`)"
        		. " VALUES ('$tipo_habitacion', '$num_habitacion','$ciudad','$valoracion', '$tipo_comida', '$email', '$pass', '$f_ini', '$f_fin','$piscina','$mayordomo','$imagen')";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function select_all_user(){
			$sql = "SELECT * FROM Habitaciones ORDER BY Numero_habitacion DESC";

			$conexion = connect::con();
			
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		
		function select_user($user){

			$sql = "SELECT * FROM Habitaciones WHERE Numero_habitacion=$user";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		
		function update_user($datos){
			$num_habitacion=$datos['num_habitacion'];
        	$tipo_habitacion=$datos['tipo_habitacion'];  
        	$tipo_comida=$datos['tipo_comida'];
        	$email=$datos['email'];
        	$pass=$datos['pass'];
        	$f_ini=$datos['f_ini'];
			$f_fin=$datos['f_fin'];
			$piscina=$datos['piscina'];
			$mayordomo=$datos['mayordomo'];    
			$ciudad=$datos['ciudad'];
			$valoracion=$datos['valoracion'];
			$imagen=$datos['imagen'];

        	$sql = " UPDATE Habitaciones SET Tipo_habitacion='$tipo_habitacion',Ciudad='$ciudad', Valoracion='$valoracion', Tipo_comida='$tipo_comida', email='$email', Contrasenya='$pass', Fecha_entrada='$f_ini',"
				. " Fecha_salida='$f_fin', Piscina='$piscina', Mayordomo='$mayordomo', imagen='$imagen' WHERE Numero_habitacion='$num_habitacion'";
				
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function delete_user($user){
			echo "dentro del delete";
			$sql = "DELETE FROM Habitaciones WHERE Numero_habitacion=$user";
			
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			echo "borrado";
            connect::close($conexion);
            return $res;
		}
		function delete_all(){
			$sql= "DELETE FROM Habitaciones";
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			echo "borrados";
            connect::close($conexion);
            return $res;
			return 0;
		}
	}