<?php
 $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/'; 
 include ($path . "/module/login/model/DAOLogin.php");
 include ($path . "module/login/model/validate_user.php");
 include ($path . "module/login/model/regenerate_sesion.php");
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
				$_SESSION['tiempo'] = time();

        echo json_encode($dinfo);
        // echo json_encode(time());

      }

    break;

    case 'register':
      $check=true;
      // $check=validate_user_register($_GET['re_user']);
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
          echo json_encode($_SESSION);
        }else{
          echo json_encode("no");
        }
      }catch(Exception $e){
        echo json_encode("fail");
      }


    break;
    
    case 'log_out':
      // echo ("session:");
      // print_r ($_SESSION['user']);
      // session_destroy();
      echo ("sesion status:");
      echo session_status();
      unset($_SESSION['type']);
      unset($_SESSION['user']);
      unset($_SESSION['tiempo']);
      // echo ($_SESSION);
      
      // if(session_destroy()) {
			// 	$callback = 'index.php?page=controller_home&op=list';
			//     die('<script>window.location.href="'.$callback .'";</script>');
			// }else{
      //    $callback = 'index.php?page=503';
      //    die('<script>window.location.href="'.$callback .'";</script>');
      // }
      //  session_destroy();
     	//  $callback = 'index.php?page=controller_home&op=list';
	    //  die('<script>window.location.href="'.$callback .'";</script>');



    break;


    case 'actividad':
      if (!$_SESSION['tiempo']) {  
       
        echo ($_SESSION['tiempo']);
        
      } else {  
        // echo ($_SESSION['tiempo']);
        if((time() - $_SESSION['tiempo']) >= 10000 ) { //a los 10 segundos se cierra si no recargas          //15 min despues
            echo "inactivo"; 
            exit();
        }else{
          echo "activo2";
          exit();
        }
  }

    break;

    case 'control_user':
      if (!isset ($_SESSION['type'])||($_SESSION['type'])!='admin'){
				if(isset ($_SESSION['type'])&&($_SESSION['type'])!='admin'){
					echo 'okay';
					exit();
				}
				echo 'no';
				exit();
			}


    break;


    case 'regenerate':
      try{
        regenerateSession_1();
      }catch(Exception $e){
        echo json_encode("exception");
      }
      echo json_encode("oko");

    break;


 }
?>