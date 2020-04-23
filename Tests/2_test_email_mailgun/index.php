<?php
    //https://github.com/mailgun/mailgun-php
    //Authorized Recipients -> afegir a 'yomogan@gmail.com'
    
    function send_mailgun($email){
		$conf= parse_ini_file(TEST_PATH . '2_test_email_mailgun/credentials.ini');
		$email="jmqmaestre@gmail.com";
    	$config = array();
    	$config['api_key'] = $conf['api_key']; //API Key
    	$config['api_url'] = $conf['api_url']; //API Base URL

    	$message = array();
    	$message['from'] = "jmqmaestre@gmail.com";
    	$message['to'] = $email;
    	$message['h:Reply-To'] = "jmqmaestre@gmail.com";
    	$message['subject'] = "Hello, this is a test";
    	$message['html'] = 'Hello ' . $email . ',</br></br> This is a test';
     
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
    
    $json = send_mailgun('jmqmaestre@gmail.com');
    print_r($json);
