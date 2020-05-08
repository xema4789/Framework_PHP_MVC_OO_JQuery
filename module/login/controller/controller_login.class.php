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

    function register(){
      // print_r("hola");
      // die;
        if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['user'])){

          //Crear token aqui y enviarlo al dao
          $token=controller_login::generate_Token_secure(20);
          
          $json = array();
          $json = loadModel(MODEL_PATH_LOGIN,"login_model", "register",$_POST['user'],$token);
          
          $email="xemaiestacio@gmail.com";
          $result=controller_login::enviar_mail($token,$email);
          
          echo json_encode($json);
        }
    }

    function generate_Token_secure($longitud){
      if ($longitud < 4) {
          $longitud = 4;
      }
      return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
  }

    function enviar_mail($token,$email){
      $conf= parse_ini_file(TEST_PATH . '2_test_email_mailgun/credentials.ini');

        $config = array();
        $config['api_key'] = $conf['api_key']; //API Key
      
        $config['api_url'] = $conf['api_url']; //API Base URL
      

        $message = array();
        $message['from'] = "xemaiestacio@gmail.com";
        $message['to'] = $email;
        $message['h:Reply-To'] = "xemaiestacio@gmail.com";
        $message['subject'] = "Hello, this is a test";
        $message['html'] = 'Hello ' . $email . ',</br></br> Para confirmar su cuenta haga click en <a href="'.amigable("?module=login&function=confirm_cuenta&token=".$token."").'">este</a> enlace';//amigable("?module=login&function=confirm_cuenta&token=".$token
      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $config['api_url']);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
        $result = curl_exec($ch);
        curl_close($ch);
      
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
        
        

        //Ir a base de datos y confirmar la cuenta donde coincida el token recibido

      }

      function validate_token($token){
        //Ir al dao, ver los tokens, y si coincide, active="true"
        $json = array();
        $json = loadModel(MODEL_PATH_LOGIN,"login_model", "validate_token",$token);
        return($json);
      }


}
?>