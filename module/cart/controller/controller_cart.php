<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/Framework/';
include ($path . "/module/cart/model/DAOCart.php");
session_start();


switch ($_GET['op']){
    case "list":
        include("module/cart/view/cart.html");

    break;

    case 'add_cart':
        //Coger id del producto y mandarlo al dao

    break;





    case 'ver_tipo':
        try{
            $daocart = new DAOCart();
            $rdo = $daocart->ver_tipo($_GET['id']);

        }catch (Exception $e){
            echo json_encode("error");
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

    break;

    case 'ver_items_carrito':


    break;

    case 'pintar_productos':
        try{
            
            $daocart = new DAOCart();
            $rdo = $daocart->pintar_productos($_GET['prods']);

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

    case 'pintar_carrito_final':
        try{
            
            $daocart = new DAOCart();
            $rdo = $daocart->pintar_carrito_final($_GET['prods']);

        }catch (Exception $e){
            echo json_encode("error exct");
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

    break;

    case 'finalizar_compra':
        try{
            // echo ("hola");
            // print_r($_GET['datos']);
            
            $daocart = new DAOCart();
            $rdo = $daocart->finalizar_compra(json_decode($_GET['datos'],true));

        }catch (Exception $e){
            echo json_encode("error exc");
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



    break;

    case 'back_up_carrito':

        try{
        
            
            $daocart = new DAOCart();
            $rdo = $daocart->back_up_carrito($_GET['id']);

        }catch (Exception $e){
            echo json_encode("error exc");
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


    break;


    case 'pintar_prods_bd':
        try{
        
            
            $daocart = new DAOCart();
            $rdo = $daocart->pintar_prods_bd();

        }catch (Exception $e){
            echo json_encode("error exc");
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

    break;

    case 'delete':
        try{
        
            
            $daocart = new DAOCart();
            $rdo = $daocart->delete($_GET['id']);

        }catch (Exception $e){
            echo json_encode("error exc");
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
    break;

    case 'cambiar_cantidad':
        try{
        
            
            $daocart = new DAOCart();
            $rdo = $daocart->cambiar_cantidad($_GET['id'],$_GET['cant']);

        }catch (Exception $e){
            echo json_encode("error exc");
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

    break;
    
    


}


?>