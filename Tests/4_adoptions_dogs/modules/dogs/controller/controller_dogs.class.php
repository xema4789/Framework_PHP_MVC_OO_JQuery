<?php
    class controller_dogs {
        function __construct() {
            include(UTILS_DOGS . "functions_dogs.inc.php");
            $_SESSION['module'] = "dogs";
        }
        
        function create_dogs() {
            require_once(VIEW_PATH_INC . "header.php");
            require_once(VIEW_PATH_INC . "menu.php");
            loadView('modules/dogs/view/', 'create_dogs.html');
            require_once(VIEW_PATH_INC . "footer.html");
        }

        function result_dogs() {
            require_once(VIEW_PATH_INC . "header.php");
            require_once(VIEW_PATH_INC . "menu.php");
            loadView('modules/dogs/view/', 'result_dog.html');
            require_once(VIEW_PATH_INC . "footer.html");
        }

        function json_dog(){
          if ((isset($_POST['json_dog']))) {
              alta_dogs();
          }
        }
        
        function upload_dog(){
          if ((isset($_POST["upload"])) && ($_POST["upload"] == true)){
              $result_dogpic = upload_files();
              $_SESSION['result_dogpic'] = $result_dogpic;
              echo json_encode($result_dogpic);
          }
        }

        function delete_dog(){
          if ((isset($_POST["delete"])) && ($_POST["delete"] == true)){
              $_SESSION['result_dogpic'] = array();
              $result = remove_files();
              if($result === true){
                echo json_encode(array("res" => true));
              }else{
                echo json_encode(array("res" => false));
              }
          }
        }

        function load_data(){
          if ((isset($_POST["load_data"])) && ($_POST["load_data"] == true)) {
              $jsondata = array();
              if (isset($_SESSION['dogs'])) {
                  $jsondata["dogs"] = $_SESSION['dogs'];
                  echo json_encode($jsondata);
                  exit;
              } else {
                  $jsondata["dogs"] = "";
                  echo json_encode($jsondata);
                  exit;
              }
          }
        }

        function load_country(){
          if(  (isset($_POST["load_country"])) && ($_POST["load_country"] == true)  ){
            $json = array();

            $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
            $json = loadModel(MODEL_DOGS, "dogs_model", "obtain_countries", $url);
            /*
            if (is_writable(RESOURCES . "ListOfCountryNamesByName.json")) {
              $file = fopen(RESOURCES . "ListOfCountryNamesByName.json","w");
              $aux = fwrite($file, "$json");
              fclose($file);
            }
            */

            if($json){
              echo $json;
              exit;
            }else{
              $json = "error";
              echo $json;
              exit;
            }
          }
        }

        function load_provinces(){
          if(  (isset($_POST["load_provinces"])) && ($_POST["load_provinces"] == true)  ){
              $jsondata = array();
              $json = array();

            $json = loadModel(MODEL_DOGS, "dogs_model", "obtain_provinces");
            if($json){
              $jsondata["provinces"] = $json;
              echo json_encode($jsondata);
              exit;
            }else{
              $jsondata["provinces"] = "error";
              echo json_encode($jsondata);
              exit;
            }
          }
        }

        function load_cities(){
          if( isset($_POST['idPoblac']) ){
            $jsondata = array();
            $json = array();

            $json = loadModel(MODEL_DOGS, "dogs_model", "obtain_cities", $_POST['idPoblac']);
            if($json){
              $jsondata["cities"] = $json;
              echo json_encode($jsondata);
              exit;
            }else{
              $jsondata["cities"] = "error";
              echo json_encode($jsondata);
              exit;
            }
          }
        }

        function load_info_dog(){
          if (isset($_POST["load"]) && $_POST["load"] == true) {
              $jsondata = array();
              if (isset($_SESSION['dogs'])) {
                  $jsondata["dogs"] = $_SESSION['dogs'];
              }
              if (isset($_SESSION['message'])) {
                  $jsondata["message"] = $_SESSION['message'];
              }
              close_session();
              echo json_encode($jsondata);
              exit;
          }
        }
    }

function alta_dogs(){
	$jsondata = array();
	$result=validate_dogs(json_decode($_POST['json_dog'], true));
  $token = json_decode($_POST['json_dog'],true);
  $id_user = loadModel(MODEL_DOGS, "dogs_model", "select_creator", $token['token']);
  
    if (empty($_SESSION['result_dogpic'])){
      $_SESSION['result_dogpic'] = array('result' => true, 'error' => "", "data" => "/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/media/default_avatar.svg");
    }
    $result_dogpic = $_SESSION['result_dogpic'];

	if($result['result'] && $result_dogpic['result']) {
		$arrArgument = array(
      'dname' => $result['data']['dname'],
      'dchip' => $result['data']['dchip'],
      'breed' => $result['data']['breed'],
      'dtlp' => $result['data']['dtlp'],
      'cinfo' => $result['data']['cinfo'],
      'sex' => $result['data']['sex'],
      'stature' => $result['data']['stature'],
      'date_birth' => $result['data']['date_birth'],
      'date_regis' => $result['data']['date_regis'],
      'country' => $result['data']['country'],
      'province' => $result['data']['province'],
      'city' => $result['data']['city'],
      'dinfo' => $result['data']['dinfo'],
      'dogpic' => $result_dogpic['data'],
      'id_user' =>$id_user[0]['IDuser']
    );

    $arrValue = false;
    $arrValue = loadModel(MODEL_DOGS, "dogs_model", "create_dog", $arrArgument);
    if ($arrValue){
        $message = "El perro ha sido registrado correctamente";
    }else{
        $message = "El perro no se ha podido registar en base de datos";
    }
		$_SESSION['dogs'] = $arrArgument;
    $_SESSION['message'] = $message;
  	$jsondata['success'] = true;
  	$jsondata['redirect']="../../dogs/result_dogs/";

    unset($_SESSION['result_dogpic']);
    echo json_encode($jsondata);
   	exit();
 	}else{
 		$jsondata['success'] = false;
 		$jsondata['error'] = $result['error'];
    $jsondata['error_pic'] = $result_dogpic['error'];
 		header('HTTP/1.0 400 Bad error');
    	echo json_encode($jsondata);
 	}
}

function close_session() {
    unset($_SESSION['dogs']);
    unset($_SESSION['message']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}
