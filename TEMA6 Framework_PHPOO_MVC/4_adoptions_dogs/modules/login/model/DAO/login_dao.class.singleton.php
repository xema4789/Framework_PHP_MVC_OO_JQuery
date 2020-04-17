<?php
    class login_dao {
        static $_instance;

        private function __construct() {

        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function insert_data_social($db,$arrArgument) {
            $id_user = $arrArgument['id_user'];
            $user = $arrArgument['user'];
            $email = $arrArgument['email'];
            $avatar = $arrArgument['avatar'];
            $token = md5(uniqid(rand(),true));
            $sql = "INSERT INTO users(IDuser,user,email,password,type,avatar,activate,token,name,surname,birthday) VALUES('$id_user','$user','$email','','user','$avatar',1,'$token', '', '', '')";
            return $db->ejecutar($sql);
        }
        
        public function insert_user_page($db,$arrArgument) {
            $user = $arrArgument['ruser'];
            $email = $arrArgument['remail'];
            $password = crypt($arrArgument['rpasswd'], '$1$rasmusle$');
            
            $token = md5(uniqid(rand(),true));
            $img = 'https://www.gravatar.com/avatar/' . md5($email) . '?s=80&d=identicon&r=g';
            $sql = "INSERT INTO users(IDuser,user,email,password,type,avatar,activate,token,name,surname,birthday) VALUES('$user','$user','$email','$password','user','$img',0,'$token', '', '', '')";
            $db->ejecutar($sql);
            return $token;
        }

        public function select_rid_social($db,$arrArgument) {
            $sql = "SELECT IDuser FROM users WHERE IDuser = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_exist_user($db,$arrArgument) {
            $sql = "SELECT password,activate,token FROM users WHERE IDuser = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_type_user($db,$arrArgument) {
            $sql = "SELECT type FROM users WHERE token = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_print_user($db,$arrArgument) {
            $sql = "SELECT IDuser,user,email,avatar,name,surname,birthday FROM users WHERE token = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_update_user($db,$arrArgument) {
            $user = $arrArgument['user'];
            $pname = $arrArgument['pname'];
            $psurname = $arrArgument['psurname'];
            $pbirthday = $arrArgument['pbirthday'];
            $sql = "UPDATE users SET name = '$pname',surname = '$psurname',birthday = '$pbirthday' WHERE IDuser = '$user'";
            return $db->ejecutar($sql);
        }

        public function select_get_mail_to($db,$arrArgument) {
            $sql = "SELECT email,token FROM users WHERE IDuser = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function update_passwd($db,$arrArgument) {
            $pass = crypt($arrArgument['recpass'], '$1$rasmusle$');
            $token = $arrArgument['token'];
            $sql = "UPDATE users SET password = '$pass' WHERE token = '$token'";
            return $db->ejecutar($sql);
        }

        public function update_avatar($db,$arrArgument) {
            $url = $arrArgument['data'];
            $user = $arrArgument['user'];
            $sql = "UPDATE users SET avatar = '$url' WHERE IDuser = '$user'";
            return $db->ejecutar($sql);
        }

        public function select_dog($db,$arrArgument) {
            $sql = "SELECT name,chip,breed,sex,stature,picture,date_birth,state FROM `dogs` WHERE owner = '$arrArgument' OR chip = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_adoption($db,$arrArgument) {
            $sql = "SELECT dog FROM `adoption` WHERE user = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function conceal_dog($db,$arrArgument) {
            $sql = "UPDATE dogs SET state = 2 WHERE chip = '$arrArgument'";
            return $db->ejecutar($sql);
        }
        
        public function visible_dog($db,$arrArgument) {
            $sql = "UPDATE dogs SET state = 0 WHERE chip = '$arrArgument'";
            return $db->ejecutar($sql);
        }

    }
