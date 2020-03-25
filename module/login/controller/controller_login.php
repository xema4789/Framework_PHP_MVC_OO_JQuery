<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 
 include ($path . "/module/login/model/DAOLogin.php");
 include ($path . "module/login/model/validate_user.php");

 switch($_GET['op']){
   case 'list_login':
      include($path . "module/login/view/view_login.php");
   break;

    case 'login':
     
      $check=true;
      $check=validate_user_login($_GET['lo_user']);

      if($check){
        try{
          $daologin = new DAOLogin();
          $rdo = $daologin -> login_user($_GET['lo_user'],$_GET['lo_password']);
          
          

        }catch(Exception $e){
          $callback = 'index.php?page=503';
          die('<script>window.location.href="'.$callback .'";</script>');
        }
      }else{
        echo json_encode("error else del check");//return true me daba el error
        exit;
      }

      if(!$rdo){
        echo json_encode("error !rdo");
        exit;
      }else{

        $value=get_object_vars($rdo);
        // $dinfo = array();
        //     foreach ($rdo as $row) {
        //         array_push($dinfo, $row);
        //     }
        //     echo json_encode($dinfo);


        // $dinfo = array();
        // foreach ($rdo as $row) {
        //     array_push($dinfo, $row);
        // }
        // echo json_encode($dinfo);
        // echo json_encode("Todo bien");
        // exit;


      }

    break;

    case 'register':
      $check=true;
      $check=validate_user_register($_GET['re_user']);
        if($check){
          try{
            $daologin = new DAOLogin();
            $rdo=$daologin->insert_user($_GET['re_user'],$_GET['re_password'],$_GET['re_email']);
            print_r($rdo);//Esto es para que detecte que se ha hecho correctamente
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