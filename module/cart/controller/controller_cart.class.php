<?php
    class controller_cart{
        function __construct(){
            $_SESSION['module']='cart';
        }
        function list_cart(){
            
            require(VIEW_PATH_INC . "top_page_cart.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/cart/view/','cart.html');
            require (VIEW_PATH_INC . "footer.php");
        }

        function pintar_productos(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
               
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "pintar_productos");
                echo json_encode($json);
            }
        }

        function pintar_prods_bd(){
          
            if((isset($_POST['okay'])) && ($_POST['okay'] == true)){
               
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "pintar_prods_bd");
                echo json_encode($json);
            }
        }

    }


?>