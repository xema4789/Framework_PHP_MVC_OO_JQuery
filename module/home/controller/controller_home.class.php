<?php
    class controller_home{
        function __construct(){
            $_SESSION['module']='home';
        }

        function list_home(){
            require(VIEW_PATH_INC . "top_page_home.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/home/view/','inicio.html');
            require (VIEW_PATH_INC . "footer.php");
        }


        function list_ciudades_valoracion(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
                $json = array();
                $json = loadModel(MODEL_PATH_HOME,"home_model", "list_ciudades_valoracion");
                echo json_encode($json);
            }
        }

        function list_tipos(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
                $json = array();
                $json = loadModel(MODEL_PATH_HOME,"home_model", "list_tipos"); 
                echo json_encode($json);
            }
        }
        function list_ciudades(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
                $json = array();
                $json = loadModel(MODEL_PATH_HOME,"home_model", "list_ciudades"); 
                echo json_encode($json);
            }
        }

        function list_visitas(){
            
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['arrArgument'])){
                $json = array();
                $json = loadModel(MODEL_PATH_HOME,"home_model", "list_ciudades",$_POST['arrArgument']); 
                echo json_encode($json);
            }
        }
    }

?>