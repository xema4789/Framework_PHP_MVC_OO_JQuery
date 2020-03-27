<?php
    function regenerateSession_1(){
	    session_start();
    	$id_sesion_antigua = session_id();
    	session_regenerate_id();//Aqui cambia el id de sesion a por uno nuevo
    	$id_sesion_nueva = session_id();
    	// echo "old session: $id_sesion_antigua<br />";
    	// echo "new session: $id_sesion_nueva<br />";
    }
    


    function regenerateSession_2(){
	    session_start();
    	$id_sesion_antigua = session_id();
    	
	    // Create new session without destroying the old one
		session_regenerate_id(false);

		// Grab current session ID and close both sessions to allow other scripts to use them
		$newSession = session_id();
		session_write_close();

		// Set session ID to the new one, and start it back up again
		session_id($newSession);
		session_start();
		$id_sesion_nueva = session_id();
    	echo "old session: $id_sesion_antigua<br />";
    	echo "new session: $id_sesion_nueva<br />";
	}
    // regenerateSession_2();

?>