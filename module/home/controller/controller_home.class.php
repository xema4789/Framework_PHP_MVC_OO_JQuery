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


        function list_ciudades_valoracion(){

            try{
                $daohome = new DAOHome();
                $rdo = $daohome->list_ciudades_valoracion();
            }catch(Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
    
            }
        }
    }

?>