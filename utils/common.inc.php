<?php
  function loadModel($model_path, $model_name, $function, $arrArgument = '',$arrArgument2 = ''){
        $model = $model_path . $model_name . '.class.singleton.php';
        $model=str_replace('"\"',"",$model);


        //el model necesita el del bll y bll necesita el del dao
        
        if (file_exists($model)) {
            include_once($model);
            $modelClass = $model_name;
            

            if (!method_exists($modelClass, $function)){
                // echo json_encode("ERROR");
                // die;
                throw new Exception();
            }

           
            
            $obj = $modelClass::getInstance();//me peta aqui en el shop
            // echo json_encode($obj);
            // die;
            if (isset($arrArgument)){
                
                if ($arrArgument2) {
  
                    return call_user_func(array($obj, $function),$arrArgument,$arrArgument2);
                }
                return call_user_func(array($obj, $function),$arrArgument);
            }   
            
        } else {
            echo json_encode("ADIOS");
            die;
            throw new Exception();
        }
    }

    function loadView($rutaVista = '', $templateName = '', $arrPassValue = '') {
        $view_path = $rutaVista . $templateName;
        $arrData = '';

        if (file_exists($view_path)) {
            if (isset($arrPassValue))
                $arrData = $arrPassValue;
            include_once($view_path);
        } else {
            /*$result = response_code($rutaVista);
            $arrData = $result;
            require_once VIEW_PATH_INC_ERROR . "error.php";*/
            //die();
        }
    }
