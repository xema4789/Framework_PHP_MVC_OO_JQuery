<?php
//poner lo del path
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; //no me esta pillando bien el path y en consecuencia el include de despues
	include($path . "model/connect.php");
    //include("model/connect.php");
    
	class DAOUser{
		function insert_user($datos){
			echo "prueba";
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
		
			 

        	// foreach ($datos[idioma] as $indice) {
        	//     $language=$language."$indice:";
        	// }
        	// $comment=$datos[observaciones];
        	// foreach ($datos[aficion] as $indice) {
        	//     $hobby=$hobby."$indice:";
        	// }
        	$sql = " INSERT INTO Habitaciones (`Tipo_habitacion`, `Numero_habitacion`,`Ciudad`, `Valoracion`, `Tipo_comida`, `email`, `Contrasenya`, `Fecha_entrada`, `Fecha_salida`,`Piscina`,`Mayordomo`,`imagen`)"
        		. " VALUES ('$tipo_habitacion', '$num_habitacion','$ciudad','$valoracion', '$tipo_comida', '$email', '$pass', '$f_ini', '$f_fin','$piscina','$mayordomo','$imagen')";
			
				//INSERT INTO `Habitaciones`(`Tipo_habitacion`, `Numero_habitacion`, `Tipo_comida`, `email`, `Contrasenya`, `Fecha_entrada`, `Fecha_salida`) VALUES ('$_POST[tipo_habitacion]','$_POST[num_habitacion]','$_POST[tipo_comida]','$_POST[email]','$_POST[contrasenya]','2020-01-01','2020-01-20')

			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function select_all_user(){
			//echo "prueba select *";
			
			
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
        	// foreach ($datos[idioma] as $indice) {
        	//     $language=$language."$indice:";
        	// }
        	// $comment=$datos[observaciones];
        	// foreach ($datos[aficion] as $indice) {
        	//     $hobby=$hobby."$indice:";
        	// }
			
			//UPDATE `Habitaciones` SET `Tipo_habitacion`=[value-1],`Numero_habitacion`=[value-2],`Tipo_comida`=[value-3],`email`=[value-4],`Contrasenya`=[value-5],`Fecha_entrada`=[value-6],`Fecha_salida`=[value-7] WHERE 1

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
			echo "dentro del delete all";
			
			//$prueba=comprobar();
			//echo "despues de comprobar: ";
			//print_r ("$prueba");
			//if(comprobar()){
				echo "dentro despues de comprobar";
			$sql= "DELETE FROM Habitaciones";
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			echo "borrados";
            connect::close($conexion);
            return $res;
			//}
			//echo "no ha comprobado nada el desgraciao";
			//Mostrar aviso de que la bd está vacia
			return 0;

			
		}


		// function comprobar(){
		// 	echo "dentro de comprobar, res: ";
		// 	$res= select_all_user();
		// 	print_r ("$res");
		// 	if($res){
		// 		return false;
		// 	}
		// 	return true;
		// }

	}