<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 

 switch($_GET['op']){
   case 'list_login':
      include("module/login/view/view_login.php");
   break;

    case 'login':

    break;

    case 'register':

      include("module/login/model/validate_user.php");
      $check=true;

      if($_POST){

        $check=validate_user_register();

        if(!$check){
          try{
            $daologin = new DAOLogin();
            $rdo=$daologin->insert_user($_POST);
          }catch(Exception $e){
            $callback = 'index.php?page=503';
            die('<script>window.location.href="'.$callback .'";</script>');
          }
          if($rdo){
            echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
            $callback = 'index.php?page=controller_login&op=list_login';
            die('<script>window.location.href="'.$callback .'";</script>');
          }else{
            $callback = 'index.php?page=503';
            die('<script>window.location.href="'.$callback .'";</script>');
        }
        }
      }
      // pintar_login('register');
      // include("module/login/view/view_login.html");



    break;


 }
?>