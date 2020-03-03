<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
include ($path . "/module/shop/model/DAOShop.php");
session_start();

switch($_GET['op']){

    case 'list':
        include("module/shop/view/shop.php");
    break;

    case 'list_habitaciones':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_habitaciones();
            //pintar($rdo);   
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


            //$habitacion ?
            //echo json_encode($rdo);
            exit;
        }
    break;    

    case 'list_modal':
        try{
            //echo ("dentro del try");
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_habitacion($_GET['hab']);   
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
            $daoshop = new DAOShop();
            // $rdo = $daoshop->list_tipos();
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

    case 'list_ciudades':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_por_ciudad($_GET['ciudad']);
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

    case 'list_habitacion':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_habitacion($_GET['hab']);
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

    case 'list_categorias':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_categorias($_GET['cat']);
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

    case 'filtrar':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->filtrar($_GET['consulta']);
        }catch(Exception $e){
            echo json_encode("error exception");
            exit;
        }
        if(!$rdo){
            echo json_encode("error rdo");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);

        }

    break;


    case 'maps':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->maps();
        }catch(Exception $e){
            echo json_encode("error exception");
            exit;
        }
        if(!$rdo){
            echo json_encode("error rdo");
            exit;
        }else{
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);

        }

    break;


}


?>