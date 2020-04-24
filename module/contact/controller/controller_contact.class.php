<?php
    class controller_contact{
        function __construct(){
            $_SESSION['module']="contact";
        }

        function list_contact(){
            print_r("ole los caracoleees");
            die;
            require(VIEW_PATH_INC. "top_page_contact.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/contact/view/','contactus.html');
            require (VIEW_PATH_INC . "footer.php");
        }
    }

?>