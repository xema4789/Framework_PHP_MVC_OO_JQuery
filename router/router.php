<?php
require_once ("paths.php");
require ("autoload.php");

include(UTILS . "utils.inc.php");
include(UTILS . "common.inc.php");
// include(UTILS . "upload.inc.php");
include(UTILS . "mail.inc.php");


ob_start();
session_start();
$_SESSION['module'] = "";


function handlerRouter(){
    
    if(!empty($_GET['module'])){ //Buscamos el modulo, si no hay por defecto home
        $URI_module = $_GET['module'];
        
        
    }else{
        $URI_module='home';
       

        echo'<script>window.location.href = "./home/list_home";</script>'; //Cambiar cuando funcione a list home por defecto
                                            //?module=contact&function=list_contact
                                            //./contact/list_contact/
    }                                       //"?module=contact&function=list_contact"
   

    if(!empty($_GET['function'])){ //Buscamos la funcion, si no hay por defecto list_home
        $URI_function = $_GET['function'];

    }else{
        // print_r("empty func");
        $URI_function = 'list_home';
    }

    handlerModule($URI_module,$URI_function); //Cargamos el module con el modulo y la funcion que le hemos pasado

    
}

function handlerModule($URI_module,$URI_function){
    
    

    $modules=simplexml_load_file("resources/modules.xml");

    $exist=false;
    
    foreach($modules->module as $module){//Recorremos la variable modules para buscar el modulo que le hemos pasado
    
        if(($URI_module === (String) $module->uri)){//modulo encontrado
            $exist=true;

            $path=MODULES_PATH . $URI_module . "/controller/controller_".$URI_module . ".class.php";
    

            if(file_exists($path)){
               
                require_once($path);//hacemos el include del path, que contiene la ruta del modulo que le hemos pasado
                $controllerClass="controller_" . $URI_module;
               
                $obj = new $controllerClass;
               
            }else{
               
                require_once(VIEW_PATH_INC . "top_page.php");
                require_once(VIEW_PATH_INC . "header.php");
                require_once(VIEW_PATH_INC . "menu.php");
                require_once(VIEW_PATH_INC . "404.php");
                require_once(VIEW_PATH_INC . "footer.php");
            }
            handlerfunction(((String) $module->name),$obj,$URI_function); //buscamos la funcion
        break;
        }
    }
    if (!$exist){ //Si no la ha encotrado 404
        require_once (VIEW_PATH_INC . "top_page.php");
        require_once (VIEW_PATH_INC . "header.php");
        require_once (VIEW_PATH_INC . "menu.php");
        require_once (VIEW_PATH_INC . "404.php");
        require_once (VIEW_PATH_INC . "footer.php");
    }
}

function handlerFunction($module, $obj, $URI_function){
    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/function.xml"); //Pillamos las funciones del xml y las guardamos en $functions
    $exist=false;

    foreach($functions->function as $function){ //Recorremos la variable buscando la funcion
        if(($URI_function === (String) $function->uri)){//Funcion encontrada
            $exist = true;
            $event = (String) $function->name; 
        break;
        }
    }

    if(!$exist){ //si no la ha encontrado 404
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "menu.php");
        require_once(VIEW_PATH_INC . "404.php");
        require_once(VIEW_PATH_INC . "footer.php");
    }else{
        call_user_func(array($obj, $event));
    }

}

handlerRouter();
?>