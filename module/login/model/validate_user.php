<?php
    function validate_user_register($usuario){

        try{
            $daologin = new DAOLogin();
            $rdo= $daologin->select_user($usuario);
        }catch(Exception $e){
            $callback = 'index.php?page=503';
			die('<script>window.location.href="'.$callback .'";</script>');
        }
        if(mysqli_num_rows($rdo)>0){
            //Usuario en uso
            return false;
        }else{
            //No hay ningun usuario con el mismo nombre
            return true;
        }
    }
?>