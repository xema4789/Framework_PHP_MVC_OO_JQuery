<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/'; 
 include ($path . "/module/login/model/DAOLogin.php");
 include ($path . "module/login/model/validate_user.php");
 session_start();

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
          $hola=mysqli_fetch_assoc($rdo);//Transforma objeto de mysql en una array
          
        }catch(Exception $e){
          echo json_encode("error exception");
        }
      }else{
        echo json_encode("error else del check");//return false me daba el error
        exit;
      }
      if(!$rdo){
        echo json_encode("error !rdo vacio");
        exit;
      }else{
        //Guardar datos (user y password) en $_SESSION
        $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }

        
        // echo json_encode(mysqli_fetch_assoc($rdo));

        $_SESSION['type'] = $hola['type'];
        $_SESSION['user'] = $hola['user'];
					// $_SESSION['tiempo'] = time();

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

    case 'ver_usuario':
      try{
        if($_SESSION['user']){
          // $user = array(
          //   "nombre" -> $_SESSION['user'],
          //   "tipo" -> $_SESSION['type'],

          // );


          echo json_encode($_SESSION);
        }else{
          echo json_encode("no");
        }
      }catch(Exception $e){
        echo json_encode("fail");
      }


    break;
    
    case 'log_out':
      // session_unset($_SESSION['type']);
			if(session_destroy()) {
				$callback = 'index.php?page=controller_home&op=list';
			    die('<script>window.location.href="'.$callback .'";</script>');
			}else{
         $callback = 'index.php?page=503';
         die('<script>window.location.href="'.$callback .'";</script>');
      }


    break;


 }
?>