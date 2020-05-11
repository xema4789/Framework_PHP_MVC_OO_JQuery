<?php
    function enviar_email($arr) {
        $html = '';
        $subject = '';
        $body = '';
        $ruta = '';
        $return = '';
        
        switch ($arr['type']) {
            case 'alta':
                $subject = 'Tu Alta Hoteles Xema';
                $ruta = "<a href='" . amigable("?module=login&function=confirm_cuenta&token=" . $arr['token'], true) . "'>aqu&iacute;</a>";
                $body = 'Gracias por unirte a nuestro Hotel<br> Para finalizar el registro, pulsa ' . $ruta;
                break;
    
            case 'changepass':
                $subject = 'Tu Nueva Contraseña en Hoteles Xema<br>';
                $ruta = '<a href="' . amigable("?module=login&function=change_passwd&aux=" . $arr['token'], true) . '">aqu&iacute;!!!!!!!</a>';
                $body = 'Hola '.$arr['nombre'].'!. Para recordar tu password pulsa ' . $ruta;
                break;
                
            case 'contact':
                $subject = 'Tu Petición a Hoteles Xema ha sido enviada<br>';
                $ruta = '<a href=' . 'http://localhost/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/'. '>aqu&iacute;</a>';
                $body = 'Para visitar nuestra web, pulsa ' . $ruta;
                break;
    
            case 'admin':
                $subject = $arr['inputSubject'];
                $body = 'inputName: ' . $arr['inputName']. '<br>' .
                'inputEmail: ' . $arr['inputEmail']. '<br>' .
                'inputSubject: ' . $arr['inputSubject']. '<br>' .
                'inputMessage: ' . $arr['inputMessage'];
                break;
        }
        
        $html .= "<html>";
        $html .= "<body>";
            $html .= "Asunto:";
            $html .= "<br><br>";
	       $html .= "<h4>". $subject ."</h4>";
           $html .= "<br><br>";
           $html .= "Mensaje:";
           $html .= '<br><img id="foto_mail" src="http://localhost/Programacion/Tema5_1.0/Tema5_1.0/Framework/Programacion/Tema5_1.0/Tema5_1.0/Framework/view/img/hotel_mail.jpg"></img><br>';
           $html .= $arr['inputMessage'];
           $html .= "<br><br>";
	       $html .= $body;
	       $html .= "<br><br>";
	       $html .= "<p>Sent by Hoteles Xema</p>";
		$html .= "</body>";
		$html .= "</html>";

        //set_error_handler('ErrorHandler');
        try{
            if ($arr['type'] === 'admin')
                $address = 'xemaiestacio@gmail.com';
            else
                $address = $arr['inputEmail'];
            $result = send_mailgun('xemaiestacio@gmail.com', $address, $subject, $html);    
        } catch (Exception $e) {
			$return = 0;
		}
		//restore_error_handler();
        return $result;
    }


 function send_mailgun($from,$email,$subject,$html){
    $conf= parse_ini_file(TEST_PATH . '2_test_email_mailgun/credentials.ini');
    $email="xemaiestacio@gmail.com";
    $config = array();
    $config['api_key'] = $conf['api_key']; //API Key
    $config['api_url'] = $conf['api_url']; //API Base URL

    $message = array();
    $message['from'] = "HotelSupport@gmail.com";
    $message['to'] = $email;
    $message['h:Reply-To'] = "xemaiestacio@gmail.com";
    $message['subject'] = $subject;
    $message['html'] = $html;
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $config['api_url']);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
