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
    // print_r("1");
    
    if(!empty($_GET['module'])){ //Buscamos el modulo, si no hay por defecto home
        $URI_module = $_GET['module'];
        // print_r("no empty");
        // print_r("urimodule: ");
        // print_r($URI_module);
        
    }else{
        $URI_module='home';
        // print_r("empty");

        echo'<script>window.location.href = "./home/list_home";</script>'; //Cambiar cuando funcione a list home por defecto
                                            //?module=contact&function=list_contact
                                            //./contact/list_contact/
    }                                       //"?module=contact&function=list_contact"
   

    if(!empty($_GET['function'])){ //Buscamos la funcion, si no hay por defecto list_home
        
        // print_r("no empty funct");
        $URI_function = $_GET['function'];
        // print_r("func:   ");
        // print_r($URI_function);
      


    }else{
        // print_r("empty func");
        $URI_function = 'list_home';
    }

    handlerModule($URI_module,$URI_function); //Cargamos el module con el modulo y la funcion que le hemos pasado

    
}

function handlerModule($URI_module,$URI_function){
    // print_r("2");
    $modules=simplexml_load_file("resources/modules.xml");
    // print_r("3");
    // print_r("xml:   ");
    // print_r($modules);
    $exist=false;
    
    foreach($modules->module as $module){//Recorremos la variable modules para buscar el modulo que le hemos pasado
        // print_r("4");
        if(($URI_module === (String) $module->uri)){//modulo encontrado
            $exist=true;

            $path=MODULES_PATH . $URI_module . "/controller/controller_".$URI_module . ".class.php";
            // // print_r("path: ");
            // print_r($path);

            if(file_exists($path)){
                // print_r("5");
                require_once($path);//hacemos el include del path, que contiene la ruta del modulo que le hemos pasado
                $controllerClass="controller_" . $URI_module;
                // print_r($controllerClass);
                $obj = new $controllerClass;
                // echo ("no es el objeto");
            }else{
                //Controlador no encontrado
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