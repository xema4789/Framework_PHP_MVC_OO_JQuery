<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
include ($path . "/module/inicio/model/DAOHome.php");
session_start();

switch($_GET['op']){

    case 'list':
        include("module/inicio/view/inicio.html");
    break;

    case 'select_all_tipos':  
    break;

    case 'list_imagenes':
        try{
            $daohome = new DAOHome();
            $rdo = $daohome->list_imagenes(); 
        }catch (Exception $e){
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
            exit;
        }
    break;    

    case 'list_ciudades_valoracion':
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
        
    break;

    case 'select_habitacion':
        try{

            $daohome = new DAOHome();
            $rdo = $daohome->select_habitacion($_GET['hab']);
        }catch (Exception $e){
            echo json_encode("error");
            exit;
        }//end try
        if(!$rdo){
            echo json_encode("error");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
            exit;
        }

    break;

    case 'list_tipos':
        try{
            //echo ("dentro del try");
            $daohome = new DAOHome();
            $rdo = $daohome->list_tipos();
        }catch (Exception $e){
            echo json_encode("error");
            exit;
        }//end try
        if(!$rdo){
            echo json_encode("error");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
            exit;
        }

    break;

    case 'list_ciudades':
        try{
            //echo ("dentro del try");
            $daohome = new DAOHome();
            $rdo = $daohome->list_ciudades();
        }catch (Exception $e){
            echo json_encode("error");
            exit;
        }//end try
        if(!$rdo){
            echo json_encode("error");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
            exit;
        }
    break;


    case 'list_visitas':
        try{
            $daohome = new DAOHome();
            $rdo = $daohome->list_visitas($_GET['num']);
        }catch (Exception $e){
            echo json_encode("error exception");
            exit;
        }//end try
        if(!$rdo){
            echo json_encode("error rdo");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
            exit;
        }


    break;

}


?>