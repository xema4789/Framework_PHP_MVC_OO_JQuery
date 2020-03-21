<?php
    function validate_user_register(){
        try{
            $daologin = new DAOLogin();
            $rdo= $daologin->select_user($_POST['re_user']);
        }catch(Exception $e){
            $callback = 'index.php?page=503';
			die('<script>window.location.href="'.$callback .'";</script>');
        }
        if($rdo){
            //Usuario en uso
            echo ("El nombre de usuario ya está en uso");
            return true;
        }else{
            //No hay ningun usuario con el mismo nombre
            return false;
        }
    }
?>