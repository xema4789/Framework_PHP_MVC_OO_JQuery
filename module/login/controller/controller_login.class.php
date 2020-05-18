<?php
include (UTILS . "token_jwt.php");
// include (UTILS . "JWT.php");
class controller_login{
    function __construct(){
        $_SESSION['module']='login';
    }
    
    function list_login(){
        require(VIEW_PATH_INC. "top_page_login.php");
        require (VIEW_PATH_INC . "header.php");
        require (VIEW_PATH_INC . "menu.php");
        loadView('module/login/view/','view_login.php');
        require (VIEW_PATH_INC . "footer.php");
    }    
    function list_profile(){
      require(VIEW_PATH_INC. "top_page_login.php");
        require (VIEW_PATH_INC . "header.php");
        require (VIEW_PATH_INC . "menu.php");
        loadView('module/login/view/','view_profile.php');
        require (VIEW_PATH_INC . "footer.php");
    }






    
    function ver_usuario(){
        try{
            if($_SESSION['user']){
              // $token = encode_token($_SESSION['user']);
              // $array=array(
              //   "token" => $token,
              //   "sesion" => $_SESSION
              // );
              
              // print_r($token);
              // die;
              echo json_encode($_SESSION);
              // echo json_encode($_SESSION);

            }else{
              echo json_encode("no");
            }
          }catch(Exception $e){
            echo json_encode("fail ver usuario");
          }
    }






    function login(){
      if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['user'])){
        // echo json_encode($_POST);
        // die;
        //Generar token con jwt y guardarlo en localstorage

        $json = array();
        $json = loadModel(MODEL_PATH_LOGIN,"login_model", "login",$_POST['user']);
        $_SESSION['type'] = $json[0]['type'];
        $_SESSION['user'] = $json[0]['user'];
        $_SESSION['tiempo'] = time();
        
        //Generar jwt con el nombre y guardarlo en localstorage 
        $token=encode_token($_SESSION['user']);
        $token=controller_login::create_token($_SESSION['user']);
        echo json_encode($token);

        // echo json_encode($_SESSION);

      }
    }

    function create_token($nombre){
      $token=encode_token($nombre);
      return $token;
    }


    function register(){
      // print_r("hola");
      // die;
        if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['user'])){

          //Crear token aqui y enviarlo al dao
          $token=controller_login::generate_Token_secure(20);
          
          $json = array();
          $json = loadModel(MODEL_PATH_LOGIN,"login_model", "register",$_POST['user'],$token);
          
          $email="xemaiestacio@gmail.com";
          $result=controller_login::enviar_mail($token,$email,"alta");
          
          echo json_encode($json);
        }
    }

    function generate_Token_secure($longitud){
      if ($longitud < 4) {
          $longitud = 4;
      }
      return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
  }

    function enviar_mail($token,$email,$type,$nombre = ""){
      $arr['token']=$token;
      $arr['inputEmail']=$email;
      $arr['type']=$type;
      $arr['nombre']=$nombre;
      $result= enviar_email($arr);
      return $result;

      }






      function confirm_cuenta(){
        $token=$_GET['param'];
        $result=controller_login::validate_token($token);

        require(VIEW_PATH_INC. "top_page_login.php");
        require (VIEW_PATH_INC . "header.php");
        require (VIEW_PATH_INC . "menu.php");
        
        if($result=="no"){
          loadView('module/login/view/','no_confirm.php');
        }else{
          loadView('module/login/view/','confirm.php');
        }
        require (VIEW_PATH_INC . "footer.php");
      }

      function validate_token($token){
        //Ir al dao, ver los tokens, y si coincide, active="true"
        $json = array();
        $json = loadModel(MODEL_PATH_LOGIN,"login_model", "validate_token",$token);
        return($json);
      }

      function recover_passwd(){
        $user=$_POST['user'];
        // echo json_encode($user);
        if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['user'])){
          $json = array();
          $json = loadModel(MODEL_PATH_LOGIN,"login_model", "recover_passwd",$_POST['user']);
        //   $datos = array(
        //     "email" => $json[0]['email'],
        //     "token" => $json[0]['token'],
        //     "nombre" => $json[0]['user']
        // );
        echo json_encode(controller_login::enviar_mail($json[0]['token'],$json[0]['email'],"changepass",$json[0]['user']));


          // echo json_encode($json[0]['token']);
        }

      }

      function change_passwd(){
        $_SESSION['token_passwd']=$_GET['param'];

        require(VIEW_PATH_INC. "top_page_login.php");
        require (VIEW_PATH_INC . "header.php");
        require (VIEW_PATH_INC . "menu.php");
        loadView('module/login/view/','recover_passwd.php');
        require (VIEW_PATH_INC . "footer.php");
      }

      function new_passwd(){
        $passwd=$_POST['user'];
        $token=$_SESSION['token_passwd'];

        $json = array();
        $json = loadModel(MODEL_PATH_LOGIN,"login_model", "change_passwd",$passwd,$token);

        echo json_encode($json);
      }



}
?>