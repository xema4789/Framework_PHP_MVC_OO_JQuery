<?php
class controller_login{
    function __construct(){
        $_SESSION['module']='login';
    }
    
    function list_login(){
        require(VIEW_PATH_INC. "top_page_login.php");
        require (VIEW_PATH_INC . "header.php");
        require (VIEW_PATH_INC . "menu.php");
        loadView('module/login/view/','view_login.php');
        require (VIEW_PATH_INC . "footer.php");
    }    
    
    function ver_usuario(){
        try{
            if($_SESSION['user']){
              echo json_encode($_SESSION);
            }else{
              echo json_encode("no");
            }
          }catch(Exception $e){
            echo json_encode("fail");
          }
    }
}
?>