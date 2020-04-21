<?php
	class controller_adoptions {
		
		function __construct(){
	        $_SESSION['module'] = "adoptions";
		}
		
		function list_adoptions(){
			require_once(VIEW_PATH_INC . "header.php");
	        require_once(VIEW_PATH_INC . "menu.php");
	        loadView('modules/adoptions/view/', 'adoptions_list.html');
	        require_once(VIEW_PATH_INC . "footer.html");
		}
		
		function all_breeds(){
			if ((isset($_POST["all_breeds"])) && ($_POST["all_breeds"] == true)){
				$json = array();
			 	$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "all_breeds");
			 	echo json_encode($json);
			}
		}
		
		function load_list(){
			if ((isset($_POST["load_list"])) && ($_POST["load_list"] == true)){
				$json = array();
			 	$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "obtain_data_list",$_POST['rlt_breed'],$_POST['number']);
			 	echo json_encode($json);
			}
		}
		
		function number_breeds(){
			if ((isset($_POST["number_breeds"])) && ($_POST["number_breeds"] == true)){
				$json = array();
			 	$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "number_breeds",$_POST['num_breed']);
			 	echo json_encode($json);
			}
		}
		
		function details_list(){
			if ((isset($_POST["details_list"])) && ($_POST["details_list"] == true)){
				$json = array();
			 	$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "obtain_data_details",$_POST["idchip"]);
			 	echo json_encode($json);
			}
		}
		
		function adoption_dog(){
			$info = json_decode($_POST["all_info"],true);
			$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "select_user",$info["token"]);
			if ($json[0]['IDuser']) {
				$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "insert_adoption",$json[0]['IDuser'],$info["chip"]);
				if ($json) {
					$json = loadModel(MODEL_ADOPTIONS, "adoptions_model", "update_value",$info["chip"]);
					if ($json) {
						echo json_encode($json);
					}else
						echo $json_encode(false);
				}else
					echo $json_encode(false);
			}else
				echo $json_encode(false);
		}
	}