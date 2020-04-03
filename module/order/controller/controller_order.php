<?php 
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';
	include($path . "module/order/model/DAO_order.php");
	session_start();
	
	
    switch ($_GET['op']) {
		case 'list':
				include("module/order/view/list_order.html");
			break;
			
		case 'datatable':
            try{
				$daoorder = new DAOorder();
				$rlt = $daoorder->select_order();
			} catch(Exception $e){
				echo json_encode("error");
			}

			if(!$rlt){
				echo json_encode("error");
			}
			else{
				$dinfo = array();
				foreach ($rlt as $row) {
					array_push($dinfo, $row);
				}
				echo json_encode($dinfo);
			}
			break;
			
		default:
			include("view/inc/error404.php");
			break;
	}




	