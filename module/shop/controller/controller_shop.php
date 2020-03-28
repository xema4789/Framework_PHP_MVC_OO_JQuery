<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
include ($path . "/module/shop/model/DAOShop.php");
session_start();

switch($_GET['op']){

    case 'list':
        include("module/shop/view/shop.html");
    break;

    case 'list_habitaciones':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_habitaciones();

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

    case 'list_ciudad_tipos':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_ciudad_tipos($_GET['cat'],$_GET['ciudad']);
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



    case 'list_comida':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_comida($_GET['comida']);
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

    case 'list_comida_ciudad':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_comida_ciudad($_GET['comida'],$_GET['ciudad']);
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

    case 'list_comida_ciudad_categoria':

        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_comida_ciudad_categoria($_GET['comida'],$_GET['ciudad'],$_GET['categoria']);
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

    case 'list_comida_categoria':

        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_comida_categoria($_GET['comida'],$_GET['categoria']);
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

    case 'sumar_visita':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->sumar_visita($_GET['tipo']);
        }catch(Exception $e){
            echo json_encode("error exception");
            exit;
        }
        if(!$rdo){
            echo json_encode("rdo vacio");
            exit;
        }else{

            echo json_encode("rdo lleno");

        }

    break;

    case 'listar_scroll':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_mas_visitados($_GET['num']);
  
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

    case 'contar':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->contar();
  
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

    case 'list_paginacion':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->list_paginacion($_GET['posicion']);
  
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
    


    case 'busca_like':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->busca_like($_GET['id'],$_SESSION['user']);
            // echo json_encode($_GET);
    
        }catch (Exception $e){
            echo json_encode("error exception");
            exit;
        }
        
        if(!$rdo){
            echo json_encode("vacio");
            exit;
        }else{
            $hola=mysqli_fetch_assoc($rdo);
            // if(mysqli_num_rows($rdo)>0){
                // $dinfo = array();
				// foreach ($rdo as $row) {
				// 	array_push($dinfo, $row);
				// }
            // 	echo json_encode($dinfo);
            // }else{
            //     echo json_encode("vacio2");
            // }
            
            echo json_encode($hola);
    
            exit;
        }

    break;

}


?>