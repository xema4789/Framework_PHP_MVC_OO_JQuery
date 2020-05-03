<?php
    class controller_shop{
        function __construct(){
            $_SESSION['module']='shop';
        }

        function list_shop(){
            require(VIEW_PATH_INC . "top_page_shop.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/home/view/','shop.html');
            require (VIEW_PATH_INC . "footer.php");
        }
    }

?>