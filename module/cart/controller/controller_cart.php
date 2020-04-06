<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
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

    case 'finalizar_compra':
        try{
            
            $daocart = new DAOCart();
            $rdo = $daocart->finalizar_compra($_GET['datos']);

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



}


?>