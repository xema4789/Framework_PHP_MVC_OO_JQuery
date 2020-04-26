<?php
    class controller_contact{
        function __construct(){
            $_SESSION['module']="contact";
        }

        function list_contact(){
            // include(UTILS . "utils.inc.php");
            require(VIEW_PATH_INC. "top_page_contact.php");
            require (VIEW_PATH_INC . "header.php");
            require (VIEW_PATH_INC . "menu.php");
            loadView('module/contact/view/','contactus.html');
            require (VIEW_PATH_INC . "footer.php");
        }

        function send_cont(){
            $data_mail= array();
            $data_mail= json_decode($_POST['fin_data'],true);//True para que lo convierta a array
            $arrArgument = array(
                'type'=>'contact',
                'token'=>'',
                'inputName' => $data_mail['cname'],
				'inputEmail' => $data_mail['cemail'],
				'inputSubject' => $data_mail['matter'],
				'inputMessage' => $data_mail['message']
            );


            try{
                echo "<div class='alert alert-success'>".enviar_email($arrArgument)." </div>";
            } catch (Exception $e){
                echo "<div class='alert alert-error'>Server error. Try later...</div>";
            }
        }
    }

?>