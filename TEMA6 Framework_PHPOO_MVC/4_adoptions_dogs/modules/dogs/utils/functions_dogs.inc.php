<?php
	function validate_dogs($data){
		$error = array();
	    $valid = true;
	    $filter = array(
	        'dname' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^[A-Za-z]{2,21}$/')
	        ),
	        'dchip' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^[0-9]{6}[A-Z]{1}$/')
	        ),
	        'breed' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^[A-Za-z\s]{2,21}$/')
	        ),
	        'dtlp' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^[0-9]{9}$/')
	        ),
	        'date_birth' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/')
	        ),
	        'date_regis' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/')
	        ),
	        'dinfo' => array(
	            'filter' => FILTER_VALIDATE_REGEXP,
	            'options' => array('regexp' => '/^[0-9A-Za-z\s]{20,100}$/')
	        ),
	    );

    	$result = filter_var_array($data, $filter);
    	
    	$result['cinfo'] = $data['cinfo'];
    	$result['sex'] = $data['sex'];
    	$result['stature'] = $data['stature'];
	    $result['country'] = $data['country'];
	    $result['province'] = $data['province'];
	    $result['city'] = $data['city'];

    	if (count($result['cinfo']) < 2) {
    		$error['cinfo'] = "Selecciona mas de 2 opciones";
    		$valid = false;
    	}

    	if ($result['country']===''){
            $error['country']="Selecciona una opcion";
            $valid = false;
        }

	    if ($result['province']===''){
	            $error['province']="Selecciona una provincia";
	            $valid = false;
	        }

	    if ($result['city']===''){
            $error['city']="Selecciona una ciudad";
            $valid = false;
        }

    	if ($result != null && $result){
	        if(!$result['dname']){
	            $error['dname'] = "El nombre tiene que estar entre 2 y 20 caracteres";
	            $valid = false;
	        }
	        if(!$result['dchip']){
	            $error['dchip'] = "El formato del chip no es correcto";
	            $valid = false;
	        }
	        if(validate_chip($result['dchip'])){
	            $error['dchip'] = "El chip ya esta registrado en el base de datos";
	            $valid = false;
	        }
	        if(!$result['breed']){
	            $error['breed'] = "La raza tiene que estar entre 2 y 30 caracteres";
	            $valid = false;
	        }
	        if(!$result['dtlp']){
	            $error['dtlp'] = "El formato del telefono es incorrecto";
	            $valid = false;
	        }
	        if(!$result['date_birth'] ){
	            $error['date_birth'] = "El dia de naciemiento es invalida";
	            $valid = false;
	        }
	        if(validate_birth($data['date_birth'])){
	            $error['date_birth'] = "El perro tiene que tener mas de mes y medio para darlo en adopcion";
	            $valid = false;
	        }
	        if(!$result['date_regis']){
	            $error['date_regis'] = "El dia de registro es invalido";
	            $valid = false;
	        }
	        if(validate_regis($data['date_regis'])){
	            $error['date_regis'] = "El dia de registro no puede superar en una semana la fecha actual";
	            $valid = false;
	        }
	        if(!$result['dinfo']){
	            $error['dinfo'] = "La descripcion tiene que estar entre 20 y 100 caracteres";
	            $valid = false;
	        }
	    } else {
	        $valid = false;
	    };
		return $return = array('result' => $valid,'error' => $error, 'data' => $result);
	}

	function validate_birth($date){
		$thisdate = getdate();
		$resultado = strtotime($thisdate['mon'] . "/" . $thisdate['mday'] . "/" . $thisdate['year']) - strtotime($date);
		$oper=$resultado/(60*60*24);
		if($oper < 45){
			return  true;
		} else{
			return false;
		}
	}

	function validate_regis($date){
		$thisdate = getdate();
		$resultado = strtotime($date) - strtotime($thisdate['mon'] . "/" . $thisdate['mday'] . "/" . $thisdate['year']);
		$oper=$resultado/(60*60*24);
		if($oper > 7){
			return  true;
		} else{
			return false;
		}
	}

	function validate_chip($chip){
		$val = loadModel(MODEL_DOGS,"dogs_model","nduplicate_chip",$chip);
		return $val;	
	}
