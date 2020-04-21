<?php
	class controller_ubication{
		function __construct(){
			$_SESSION['module'] = "ubication";
		}
		function list_ubication(){
			require_once(VIEW_PATH_INC . "header.php");
        	require_once(VIEW_PATH_INC . "menu.php");
        	loadView('modules/ubication/view/', 'list_ubication.html');
       		require_once(VIEW_PATH_INC . "footer.html");
		}
		
		function load_location(){
			$json = loadModel(MODEL_UBICATION, "ubication_model", "load_location");
			header("Content-type: text/xml");
			echo '<markers>';
			for ($i=0; $i < count($json); $i++) { 
				$row = $json[$i];
				echo '<marker ';
				echo 'name="' . $row['name'] . '" ';
				echo 'chip="' . $row['chip'] . '" ';
				echo 'breed="' . $row['breed'] . '" ';
				echo 'lat="' . $row['lat'] . '" ';
				echo 'longit="' . $row['longit'] . '" ';
				echo 'tlp="' . $row['tlp'] . '" ';
				echo 'sex="' . $row['sex'] . '" ';
				echo 'img="' . $row['picture'] . '" ';
				echo 'city="' . $row['city'] . '" ';
				echo 'province="' . $row['province'] . '" ';
				echo '/>';
			}
		 	echo '</markers>';
		}
		
		function load_prov(){
			$json = loadModel(MODEL_UBICATION, "ubication_model", "load_prov");
			echo json_encode($json);
		}

		function get_lat_lng(){
			$prov = $_POST['prov'];
			//$ubi = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($prov).'&key=AIzaSyARtCW9CopqKbhJ5imTUBqmyqMpZss2AZQ');
			$ubi = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($prov).'&key=AIzaSyDmTsTVRhRd9t0zfTIt6yE9Q1msEie7RG8');
			
			$ubi = json_decode($ubi, true);
			if ($ubi['status'] = 'OK') {
				$latitud = $ubi['results'][0]['geometry']['location']['lat'];
				$longitud = $ubi['results'][0]['geometry']['location']['lng'];
				$point = '[{"lat":"' . $latitud . '","long":"' . $longitud . '"}]';
			}
			echo $point;
		}

		function details_list_gmap(){
			$json = loadModel(MODEL_UBICATION, "ubication_model", "details_list",$_POST['idchip']);
			echo json_encode($json);
		}
	}