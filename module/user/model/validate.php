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
    		}
        } 
    }
    function validate_numero_habitacion_up($texto){

        if($texto){
            return true;
        }else{
            return false;
        }
    }

    function validate(){
        $check=true;
        $r_num_habitacion=validate_numero_habitacion($_POST['num_habitacion']);
        
        if(!$r_num_habitacion){
            echo ("Error, el numero de habitacion ya está en uso php");
            $check=false;
        }else{
        }
        return $check;
    }

    function validate_up(){
        $check=true;
        $r_num_habitacion=validate_numero_habitacion_up($_POST['num_habitacion']);
        
        if(!$r_num_habitacion){
            echo ("Error, el numero de habitacion ya está en uso");
            $check=false;
        }
        return $check;

    }