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
// print_r("dentro de router ");


function handlerRouter(){
    print_r("dentro de handlerouter ");
    
    if(!empty($_GET['module'])){ //Buscamos el modulo, si no hay por defecto home
        $URI_module = $_GET['module'];
        print_r("dentro del if module: ");
        print_r($URI_module);
        
    }else{
        $URI_module='contact';

        echo'<script>window.location.href = "?module=contact&function=list_contact";</script>'; //Cambiar cuando funcione a list home por defecto
                                            //?module=contact&function=list_contact
                                            //./contact/list_contact/
    }
    // print_r($URI_module);

    if(!empty($_GET['function'])){ //Buscamos la funcion, si no hay por defecto list_home
        print_r("dentro del if function: ");
    
        $URI_function = $_GET['function'];
        print_r($URI_function);


    }else{
        $URI_function = 'list_contact';
    }
    // print_r($URI_function);
    // echo(" paths: ");
    // print_r(VIEW_PATH_INC);
    // print_r(UTILS);

    handlerModule($URI_module,$URI_function); //Cargamos el module con el modulo y la funcion que le hemos pasado

    
}

function handlerModule($URI_module,$URI_function){
    // print_r("dentro de handler module");
    // print_r($URI_function);
    // print_r($URI_module);
    // print_r(file("resources/modules.xml"));
    $modules=simplexml_load_file("resources/modules.xml","SimpleXMLElement");
    // if(file("resources/modules.xml")){
    //     $modules=simplexml_load_file('resources/modules.xml');
    // }else{
    //     print_r("no existe");
    // }
    
    
    print_r($modules);
    print_r("despues del simplexml");
    // die;
    $exist=false;
    

    print_r("Buscar el modulo que le hemos puesto: ");
    // die;
    foreach($modules->module as $module){//Recorremos la variable modules para buscar el modulo que le hemos pasado
        print_r("dentro del for each");
        // die;
        if(($URI_module === (String) $module->uri)){//modulo encontrado
            $exist=true;
            print_r("dentro del if");


            $path=MODULES_PATH . $URI_module . "/controller/controller_".$URI_module . ".class.php";

            if(file_exists($path)){
                require_once($path);//hacemos el include del path, que contiene la ruta del modulo que le hemos pasado
                $controllerClass="controller_" - $URI_module;
                $obj = new $controllerClass;
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
    print_r("dentro de handler function");
    // die;
    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/function.xml"); //Pillamos las funciones del xml y las guardamos en $functions
    $exist=false;

    foreach($functions->function as $function){ //Recorremos la variable buscando la funcion
        if(($URI_function === (String) $function->uri)){//Funcion encontrada
            print_r("funcion encontrada");
            // die;
            $exist = true;
            $event = (String) $function->name; 
        break;
        }else{
            print_r("funcion no encontrada");
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