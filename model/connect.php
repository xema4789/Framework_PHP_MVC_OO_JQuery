<?php
	class connect{
		public static function con(){
			$conf= parse_ini_file(MODEL_PATH . "db.ini");
			$host = $conf['host'];  
    		$user = $conf['user'];                  
			$pass = $conf['pass'];            
    		$db = $conf['db'];                     
			$conexion = mysqli_connect($host, $user,$pass,$db)or die (mysqli_connect_error()) ;
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}