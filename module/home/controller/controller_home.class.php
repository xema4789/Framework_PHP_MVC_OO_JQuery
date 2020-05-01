<?php
    class controller_home{
        function __construct(){
            $_SESSION['module']='home';
        }

        function list_home(){
            // print_r("Ole los caracoles");
            require(VIEW_PATH_INC . "top_page_home.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/home/view/','inicio.html');
            require (VIEW_PATH_INC . "footer.php");
        }


        function list_ciudades_valoracion(){
            // echo json_encode($_POST);

            if((isset($_POST['list_ciudades_valoracion'])) && ($_POST['list_ciudades_valoracion'] == true)){
                // echo json_encode("EEEEEOOOOOO1");
                $json = array();
                $json = loadModel(MODEL_PATH_HOME,"home_model", "list_ciudades_valoracion"); //$_POST['position'] //Revisar path de model_home, ver los valores que le paso, sobre todo el segundo, y el tercero será list_ciudades_valoracion, y averiguar que es POSt['position']
                // print_r($json);
                echo json_encode($json);
            }
            // print_r("List_ciudades_valoracion");
            // echo json_encode("EEEEEOOOO CACA");
          
        }
    }

?>