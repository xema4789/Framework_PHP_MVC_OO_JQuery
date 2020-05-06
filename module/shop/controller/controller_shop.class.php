<?php
    class controller_shop{
        function __construct(){
            $_SESSION['module']='shop';
        }

        function list_shop(){
            require(VIEW_PATH_INC . "top_page_shop.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/shop/view/','shop.html');
            require (VIEW_PATH_INC . "footer.php");
        }

        function list_paginacion(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && isset($_POST['arrArgument'])){
                $json = array();
                $json = loadModel(MODEL_PATH_SHOP,"shop_model", "list_paginacion",$_POST['arrArgument']); 
                echo json_encode($json);
            }
        }
        function contar(){
            
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
                // echo json_encode("CONTAR CONTROLLER");
                // die;
                $json = array();
                $json = loadModel(MODEL_PATH_SHOP,"shop_model", "contar"); 
                echo json_encode($json);
            }
        }
        function maps(){
            
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
                // echo json_encode("CONTAR CONTROLLER");
                // die;
                $json = array();
                $json = loadModel(MODEL_PATH_SHOP,"shop_model", "maps"); 
                echo json_encode($json);
            }
        }
    }

?>