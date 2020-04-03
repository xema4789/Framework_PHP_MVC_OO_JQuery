<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
include ($path . "/module/search/model/DAOSearch.php");
session_start();

switch($_GET['op']){

    case "list_ciudades":

        try{
            $daosearch = new DAOSearch();
            $rdo = $daosearch->list_ciudad($_GET['ciudad']);
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

        case "list_ciudad":

            try{
                $daosearch = new DAOSearch();
                $rdo = $daosearch->list_ciudades();
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

    case "list_tipos":
        try{
            $daosearch = new DAOSearch();
            $rdo = $daosearch->list_tipo($_GET['tipo']);
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

    case "list_categorias":
        try{
            $daosearch = new DAOSearch();
            $rdo = $daosearch->list_categorias();
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

    case 'autocomplete':

        try{

            $daosearch = new DAOSearch();
            $rdo = $daosearch->autocomplete();
        }catch (Exception $e){
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
            
            exit;
        }


}