<?php
	class controller_login{
		function __construct(){
			 $_SESSION['module'] = "login";
			 include(UTILS_LOGIN . "functions_login.inc.php");
		}

		function list_login(){
			require_once(VIEW_PATH_INC . "header.php");
	        require_once(VIEW_PATH_INC . "menu.php");
	        loadView('modules/login/view/', 'login_list.html');
	        require_once(VIEW_PATH_INC . "footer.html");
		}

		function profile_list(){
			require_once(VIEW_PATH_INC . "header.php");
	        require_once(VIEW_PATH_INC . "menu.php");
	        loadView('modules/login/view/', 'profile_list.html');
	        require_once(VIEW_PATH_INC . "footer.html");
		}

		function changepass(){
			if (isset($_GET['param'])) {
				$_SESSION['token'] = $_GET['param'];
			}
			require_once(VIEW_PATH_INC . "header.php");
	        require_once(VIEW_PATH_INC . "menu.php");
	        loadView('modules/login/view/', 'recpass_list.html');
	        require_once(VIEW_PATH_INC . "footer.html");
		}

		function validate_login(){
			$info_data = json_decode($_POST['total_data'],true);
			$response = validate_data($info_data,'login');

			if ($response['result']) {
				$data = exist_user($info_data['luser']);
				$data = $data[0];
				echo json_encode($data['token']);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $response['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($response);
			}
		}

		function validate_register(){
			$info_data = json_decode($_POST['total_data'],true);
			$response = validate_data($info_data,'register');

			if ($response['result']) {
				$result['token'] = loadModel(MODEL_LOGIN,'login_model','insert_userp',$info_data);
				if ($result) {
					$result['type'] = 'alta';
					$result['inputEmail'] = $info_data['remail'];
					$result['inputMessage'] = 'Para activar tu cuenta en ohana dogs pulse en el siguiente enlace';
					enviar_email($result);
				}
				echo json_encode($result);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $response['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($jsondata);
			}
		}

		function log_social(){
			$data_social = json_decode($_POST['data_social_net'],true);
			$result = loadModel(MODEL_LOGIN,'login_model','rid_social',$data_social['id_user']);
			if (!$result) {
				$json = loadModel(MODEL_LOGIN,'login_model','data_social',$data_social);
			}else{
				$json = 'Registrado';
			}
			$data = exist_user($data_social['id_user']);
			$data = $data[0];
			echo json_encode($data['token']);
			exit();
		}

		function typeuser(){
			$data_social = json_decode($_POST['data_social_net'],true);
			$result = loadModel(MODEL_LOGIN,'login_model','type_user',$_POST['token']);
			if ($result) {
				echo json_encode($result);
			}else{
				echo json_encode(false);
			}
		}

		function print_user(){
			$dogs = array();
			$result = loadModel(MODEL_LOGIN,'login_model','print_user',$_POST['user']);
			$result['dog'] = loadModel(MODEL_LOGIN,'login_model','print_dog',$result[0]['IDuser']);
			$chips = loadModel(MODEL_LOGIN,'login_model','print_adoption',$result[0]['IDuser']);
			foreach ($chips as $value) {
				$dog = loadModel(MODEL_LOGIN,'login_model','print_dog',$value['dog']);
				array_push($dogs, $dog);
			}
			$result['adoptions'] = $dogs;
			echo json_encode($result);
		}

		function update_profile(){
			$prof_data = json_decode($_POST['prof_data'],true);
			$result = validate_data($prof_data,'uprofile');
			if ($result['result']) {
				$result = loadModel(MODEL_LOGIN,'login_model','update_user',$prof_data);
				echo json_encode($result);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $result['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($jsondata);	
			}
		}

		function send_mail_rec(){
			$user_rpass = $_POST['rpuser'];
			$result = validate_data($user_rpass,'rec_pass');
			if ($result['result']) {
				$result = loadModel(MODEL_LOGIN,'login_model','get_mail_to',$user_rpass);
				$result = $result[0];
				$result['token'] = $result['token'];
				$result['inputEmail'] = $result['email'];
				if ($result) {
					$result['type'] = 'changepass';
					$result['inputMessage'] = 'Para recuperar tu contraseña en ohana dogs pulse en el siguiente enlace';
					enviar_email($result);
					echo json_encode(true);
				}else{
					echo "error";
				}
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $result['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($jsondata);
			}
		}

		function update_passwd(){
			$pass_data = json_decode($_POST['rec_pass'],true);
			$pass_data['token'] = $_SESSION['token'];
			$_SESSION['token'] = '';
			$result = validate_data($pass_data,'rec_passwd');
			if ($result['result']) {
				$result = loadModel(MODEL_LOGIN,'login_model','update_passwd',$pass_data);
				echo json_encode($result);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $result['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($jsondata);	
			}
		}

		function upload_avatar(){
              $result_dogpic = upload_files();
              $_SESSION['avatar'] = $result_dogpic;
              echo json_encode($result_dogpic);
        }

    function delete_avatar(){
          unset($_SESSION['avatar']);
          $result = remove_files();
          if($result === true){
            echo json_encode(array("res" => true));
          }else{
            echo json_encode(array("res" => false));
          }
        }
        
    function modify_avatar(){
        	if (isset($_SESSION['avatar'])) {
        		$url = $_SESSION['avatar'];
        		$url['user'] = $_POST['auser'];
        		unset($_SESSION['avatar']);
        		$result = loadModel(MODEL_LOGIN,'login_model','modify_avatar',$url);
        		echo $result;
        	}
        }

    function conceal_dog(){
        	$result = loadModel(MODEL_LOGIN,'login_model','conceal_dog',$_POST['chip']);
        	echo $result;
        }

    function visible_dog(){
        	$result = loadModel(MODEL_LOGIN,'login_model','visible_dog',$_POST['chip']);
        	echo $result;
        }

	}