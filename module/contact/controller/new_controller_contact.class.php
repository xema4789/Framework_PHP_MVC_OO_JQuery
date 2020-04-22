<?php
    class controller_contact{
        function __construct(){
            $_SESSION['module']="contact";
        }

        function list_contact(){
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/contact/view/','contactus.html');
            require (VIEW_PATH_INC . "footer.html");
        }
    }

?>