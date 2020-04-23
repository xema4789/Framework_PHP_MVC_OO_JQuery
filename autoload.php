<?php
spl_autoload_register(null,false);
spl_autoload_extensions('.php,.inc.php,.class.php,.class.singleton.php');

spl_autoload_register('loadClasses');
function loadClasses($className){

    $porciones = explode ("_", $className);
    $module_name= $porciones[0];
    $model_name="";

    //Tiene que existir porciones[1] o sino habrian problemas al enviar showErrorPage

    if(isset($porciones[1])){
        $model_name=$porciones[1];
        $model_name=strtoupper($model_name);
    }

    if(file_exists('module/' . $module_name . '/model/' . $model_name . '/' . $className . '.class.singleton.php')){
        set_include_path('module/' . $module_name . '/model/' . $model_name . '/');
        spl_autoload($className);
    }
    //model
    elseif(file_exists('model/' . $className . 'class.singleton.php')){
        set_include_path('model/');
        spl_autoload($className); //khv
    }
}

?>