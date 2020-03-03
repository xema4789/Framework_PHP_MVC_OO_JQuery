<?php

    function validate_numero_habitacion($texto){
        if($texto){

            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_user($texto);
            	$user=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
                return true;
    		}else{
                return false;
                //include("module/user/view/read_user.php");
                
    		}
        }
        
    }

  

    
  // return preg_match($reg,$texto);
    
    
    // function validate_password($texto){
    //     $reg = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    //     return preg_match($reg,$texto);
    // }
    
    // function validate_nombre($texto){
    //     $reg="/^[a-zA-Z]*$/";
    //     return preg_match($reg,$texto);
    // }
    
    // function validate_DNI($dni){
    //     $reg="/^[0-9]{8}[A-Z]$/";
    //     return preg_match($reg,$dni);
    // }
    
    // function validate_sexo($texto){
    //     if(!isset($texto) || empty($texto)){
    //         return false;
    //     }else{
    //         return true;numero
    //     }
    // }
  
    
  
    
    function validate(){
        //echo "dentro del validate en php";
        $check=true;
        
        $v_num_habitacion=$_POST[num_habitacion];

        $r_num_habitacion=validate_numero_habitacion($v_num_habitacion);
        
        if(!$r_num_habitacion){
            echo ("Error, el numero de habitacion ya está en uso");
            //document.getElementById('error_num_habitacion').innerHTML = " * El numero de habitacion no es valido";
            $error_num_habitacion=" * El numero de habitacion ya está en uso php";
            $check=false;
      
            
        }

    

        return $check;


        // if($r_tipo_habitacion!==1){
        //     $error_tipo_habitacion=" * El tipo de habitacion no es validowwww";
        //     $check=false;
        // }else{
        //     $error_tipo_habitacion= "";
        // }

        // if($r_password !== 1){
        //     $error_pass = " * La contraseña introducida no es validawww";
        //     $check=false;
        // }else{
        //     $error_pass = "";
        // }

        
        // if($r_usuario !== 1){
        //     $error_usuario = " * El usuario introducido no es validowww";
        //     $check=false;
        // }else{
        //     $error_usuario = "";
        // }
        
        // if($r_nombre !== 1){
        //     $error_nombre = " * El nombre introducido no es valido";
        //     $check=false;
        // }else{
        //     $error_nombre = "";
        // }
        // if($r_DNI !== 1){
        //     $error_DNI = " * El DNI introducido no es valido";
        //     $check=false;
        // }else{
        //     $error_DNI = "";
        // }
        // if(!$r_sexo){
        //     $error_sexo = " * No has seleccionado ningun genero";
        //     $check=false;
        // }else{
        //     $error_sexo = "";
        // }
        // if(!$r_fecha_nacimiento){
        //     $error_fecha_nacimiento = " * No has introducido ninguna fecha";
        //     $check=false;
        // }else{
        //     $error_fecha_nacimiento = "";
        // }
        // if($r_edad !== 1){
        //     $error_edad = " * La edad introducida no es valida";
        //     $check=false;
        // }else{
        //     $error_edad = "";
        // }
        // if(!$r_idioma){
        //     $error_idioma = " * No has seleccionado ningun idioma";
        //     $check=false;
        // }else{
        //     $error_idioma = "";
        // }
        // if(!$r_observaciones){
        //     $error_observaciones = " * El texto introducido no es valido";
        //     $check=false;
        // }else{
        //     $error_observaciones = "";
        // }
        // if(!$r_aficion){
        //     $error_aficion = " * No has seleccionado ninguna aficion";
        //     $check=false;
        // }else{
        //     $error_aficion = "";
        // }   
    }