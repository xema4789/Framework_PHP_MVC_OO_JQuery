<?php
	class connect{
		public static function con(){
			//echo "clase con";
			$host = "127.0.0.1";  
    		$user = "xema";                  
			$pass = "@Mondongo99";            
    		$db = "Hoteles";                     
			//$port = 3306;                            
    		//$tabla="usuario";
			
			//echo ("antes de la conexion"); 

			//echo "---host: $host -user: $user -pass: $pass -db: $db";	

			//echo "-antes";
			$conexion = mysqli_connect($host, $user,$pass,$db)or die (mysqli_connect_error()) ;
			//print_r ($conexion);
			//echo "despues";

			// if ($conexion->connect_error) {
			// 	echo "if";
			// 	die("Connection failed: " . $conexion->connect_error);
			// }else{
			// 	echo "else";
			// } 

			
			// print_r($conexion);

			// echo "despues de la conexion";
			
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}