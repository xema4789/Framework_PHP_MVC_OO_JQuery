<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 
 include ($path . "/module/login/model/DAOLogin.php");
 include ($path . "module/login/model/validate_user.php");

 switch($_GET['op']){
   case 'list_login':
      include($path . "module/login/view/view_login.php");
   break;

    case 'login':
      print_r($_GET);
      $check=true;
      $check=validate_user_login($_GET['lo_user']);

      if($check){
        try{
          $daologin = new DAOLogin();
          $rdo = $daologin -> login_user($_GET['lo_user'],$_GET['lo_password']);
          print_r("rdo controller login:");
          print_r($rdo);
          

        }catch(Exception $e){
          $callback = 'index.php?page=503';
          die('<script>window.location.href="'.$callback .'";</script>');
        }
      }else{
        return false;
      }

      if(!$rdo){
        echo json_encode("error");
        exit;
      }else{
        $dinfo = array();
        foreach ($rdo as $row) {
            array_push($dinfo, $row);
        }
        echo json_encode($dinfo);

      }

    break;

    case 'register':
      $check=true;
      $check=validate_user_register($_GET['re_user']);
        if($check){
          try{
            $daologin = new DAOLogin();
            $rdo=$daologin->insert_user($_GET['re_user'],$_GET['re_password'],$_GET['re_email']);
            print_r($rdo);
            return true;
          }catch(Exception $e){
            $callback = 'index.php?page=503';
            die('<script>window.location.href="'.$callback .'";</script>');
          }
        }else{
          return false;
     
      }

    break;


 }
?>