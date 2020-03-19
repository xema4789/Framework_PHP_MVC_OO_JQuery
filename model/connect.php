<?php
	class connect{
		public static function con(){
			$host = "127.0.0.1";  
    		$user = "xema";                  
			$pass = "@Mondongo99";            
    		$db = "Hoteles";                     
			$conexion = mysqli_connect($host, $user,$pass,$db)or die (mysqli_connect_error()) ;
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}