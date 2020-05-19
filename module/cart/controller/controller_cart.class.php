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
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && ($_POST['arg1'])){
                $items= $_POST['arg1'];
                // echo json_encode($items);
                // die;
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "pintar_productos",$items);
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

        function delete(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && ($_POST['arg1'])){
                // echo json_encode("OLE LOS CARACOLES delete");
                // die;
                $id=$_POST['arg1'];
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "delete",$id);
                echo json_encode($json);
            }
        }

        function back_up_carrito(){
            
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && ($_POST['arg1'])){
                $id=$_POST['arg1'];
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "back_up_carrito",$id);
                echo json_encode($json);
            }
        }

        function pintar_carrito_final(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && ($_POST['arg1'])){
                $items=$_POST['arg1'];
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "pintar_carrito_final",$items);
                echo json_encode($json);
            }
        }

        function finalizar_compra(){
            if((isset($_POST['okay'])) && ($_POST['okay'] == true) && ($_POST['arg1'])){
                $items=$_POST['arg1'];
                $json = array();
                $json = loadModel(MODEL_PATH_CART,"cart_model", "finalizar_compra",$items);
                echo json_encode($json);
            }
        }
       

    }


?>