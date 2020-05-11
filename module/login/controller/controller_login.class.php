<?php
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
              echo json_encode($_SESSION);
            }else{
              echo json_encode("no");
            }
          }catch(Exception $e){
            echo json_encode("fail");
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
        echo json_encode($_SESSION);

      }
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

    function enviar_mail($token,$email,$type){
      $arr['token']=$token;
      $arr['inputEmail']=$email;
      $arr['type']=$type;
      enviar_email($arr);

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
          echo json_encode($json);
        }

      }





}
?>