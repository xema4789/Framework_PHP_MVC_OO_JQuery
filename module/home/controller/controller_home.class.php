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
            loadView('module/inicio/view/','inicio.html');
            require (VIEW_PATH_INC . "footer.php");
        }
    }

?>