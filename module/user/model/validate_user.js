function validate_num_habitacion(v_num_habitacion){
    if(v_num_habitacion){

        if(v_num_habitacion <10 && v_num_habitacion > 0){
            v_num_habitacion="00"+v_num_habitacion;
            //alert (v_num_habitacion);
        }else if(v_num_habitacion>10 && v_num_habitacion <100){
            v_num_habitacion="0"+v_num_habitacion; 
            //alert (v_num_habitacion);
        }else if(v_num_habitacion >999){
            return false;
        }

        //alert ("comprobando el num, que es: ");
        // $reg="/^[0-9]{3}*$/";
        // return preg_match($reg,$texto);
        //alert (v_num_habitacion);
        return v_num_habitacion;
        
    }
    //alert ("no a comprobao na ");
    return false;
    
}

function validate_tipo_habitacion($texto){
    if($texto){
        return true;
    }
    return false;
    
}
function validate_piscina($texto){
    if($texto){
        console.log ("texto");
        console.log ($texto);
        return true;
    }
    return false;
    
}
function validate_mayordomo($texto){
    if($texto==null){
        console.log("mayordomo:")
        console.log($texto);
        return $texto="No";
    }
    return $texto="Si";
}


function validate_password($texto){
    if ($texto){
        // var reg = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
        // return reg.test(texto);
        return true;
    }
    return false;
}

function validate_ciudad($texto){
    if($texto){
        return true;
    }
    return false;
}
function validate_valoracion($texto){
    if($texto){
        if($texto/2){
            return true;
        }
        // alert(typeof($texto));
        // if(typeof($texto)==='number'){
            
            
        // }
    }
    return false;
}

// function validate_tipo_habitacion(texto){
//     if (texto.length > 0){
//         // var reg=/^[a-zA-Z]*$/;
//         // return reg.test(texto);
//         return true;
//     }
//     return false;
// }

function validate_tipo_comida($texto){
    if($texto){
        return true;
    }
        return false;
    
}

function validate_email($texto){
    if($texto){
        return true;
    }
    return false;
}

function validate_f_ini($texto){
    if ($texto){
        return true;
    }
    return false;
}
function validate_f_fin($texto){
    if($texto){
        return true;
    }
    return false;
}

function validate_tipo_comida($texto){
    if ($texto){
        // var reg=/^[0-9]{1,2}$/;
        // return reg.test(texto);
        return true;
    }
    return false;
}
function validate_password($texto){
    if($texto){
        return true;
    }
    return false;
}

function validate1(tipo){
    
    var check=true
    
    var v_num_habitacion=document.getElementById('num_habitacion').value;
    //alert (v_num_habitacion);
    var v_password=document.getElementById('pass').value;
    var v_tipo_habitacion=document.getElementById('tipo_habitacion').value;
    var v_tipo_comida=document.getElementById('tipo_comida').value;
    var v_email=document.getElementsByName('email');
    var v_f_ini=document.getElementById('f_ini').value;
    var v_f_fin=document.getElementById('f_fin').value;
    var v_piscina=document.getElementById('piscina').value;
    var v_ciudad=document.getElementById('ciudad').value;
    var v_valoracion=document.getElementById('valoracion').value;

  

    var v_piscina2=document.getElementById("piscina2").value;
    console.log("piscina2");
    console.log(v_piscina2);
    //alert ("element piscina:" + v_piscina);
    //var v_piscina2=document.getElementById('piscina2').value;
    console.log(v_mayordomo);
    var v_mayordomo=document.getElementById("mayordomo").value;
    console.log("variable mayordomo:");
    console.log(v_mayordomo);
    console.log("despues de la variable mayordomo");
    //echo "piscina: ";


    

    // $piscina=$_POST['piscina'];
    // print_r("prueba");
    // print_r ($piscina);
    //$mayordomo=$_POST['mayordomo'];

    // var v_idioma=document.getElementById('idioma[]');
    // var v_observaciones=document.getElementById('observaciones').value;
    // var v_aficion=document.getElementsByName('aficion[]');
    
    var r_num_habitacion=validate_num_habitacion(v_num_habitacion);
    var r_password=validate_password(v_password);
    var r_tipo_habitacion=validate_tipo_habitacion(v_tipo_habitacion);
    var r_tipo_comida=validate_tipo_comida(v_tipo_comida);
    var r_email=validate_email(v_email);
    var r_f_ini=validate_f_ini(v_f_ini);
    var r_f_fin=validate_f_fin(v_f_fin);
    var r_piscina=validate_piscina(v_piscina);
    var r_mayordomo=validate_mayordomo(v_mayordomo);
    var r_ciudad=validate_ciudad(v_ciudad);
    var r_valoracion=validate_valoracion(v_valoracion);
    // var r_idioma=validate_idioma(v_idioma);
    // var r_observaciones=validate_observaciones(v_observaciones);
    // var r_aficion=validate_aficion(v_aficion);
    
    
    if(!r_num_habitacion){

        document.getElementById('error_num_habitacion').innerHTML = " * El numero de habitacion no puede estar vacio ni ser mayor que 999";
        check=false;
        
        //alert ('r_num');
        //alert (r_num_habitacion);
        //alert ("num habitacion no valido");
        
        //document.alta_habitacion.num_habitacion.focus();
        
        //return 0;
    }else{

        //document.getElementById('num_habitacion').innerHTML=r_num_habitacion;
        //alert ("num habitacion valido");
        document.getElementById('error_num_habitacion').innerHTML = "";
    }

    if(!r_ciudad){
        document.getElementById('error_ciudad').innerHTML = " * js La ciudad no puede estar vacia";
        check=false;
    }else{
        document.getElementById('error_ciudad').innerHTML = "";
    }
    if(!r_valoracion){
        document.getElementById('error_valoracion').innerHTML = " * js La valoracion no puede estar vacia y debe contener valores numericos";
        check=false;
    }else{
        document.getElementById('error_valoracion').innerHTML = "";
    }



    if(!r_password){
        document.getElementById('error_pass').innerHTML = " * js La contraseña introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_pass').innerHTML = "";
    }
    if(!r_tipo_habitacion){
        document.getElementById('error_tipo_habitacion').innerHTML = " * js El tipo de habitacion no es valido";
        check=false;
    }else{
        document.getElementById('error_tipo_habitacion').innerHTML = "";
    }
    if(!r_tipo_comida){
        document.getElementById('error_tipo_comida').innerHTML = " * js El tipo de comida no es valido ";
        check=false;
    }else{
        document.getElementById('error_tipo_comida').innerHTML = " ";
    }
    
    if(!r_email){
        document.getElementById('error_email').innerHTML = " * js El email no es correcto";
        check=false;
    }else{
        document.getElementById('error_email').innerHTML = "";
    }
    if(!r_f_ini){
        document.getElementById('error_f_ini').innerHTML = " * js No has introducido ninguna fecha";
        check=false;
    }else{
        document.getElementById('error_f_ini').innerHTML = "";
    }
    if(!r_f_fin){
        document.getElementById('error_f_fin').innerHTML = " * js No has introducido ninguna fecha";
        check=false;
    }else{
        document.getElementById('error_f_fin').innerHTML = "";
    }
    if(!r_piscina){
        document.getElementById('error_piscina').innerHTML=" * js Error en la piscina";
        check=false;
    }else{
        document.getElementById('error_piscina').innerHTML= "";
    }

    if(!r_mayordomo){
        document.getElementById('error_mayordomo').innerHTML=" * js Error en el mayordomo";
        check=false;
    }else{
        document.getElementById('error_mayordomo').innerHTML= "";
    }
    // if(!r_idioma){
    //     document.getElementById('error_idioma').innerHTML = " * No has seleccionado ningun idioma";
    //     check=false;
    // }else{
    //     document.getElementById('error_idioma').innerHTML = "";
    // }
    // if(!r_observaciones){
    //     document.getElementById('error_observaciones').innerHTML = " * El texto introducido no es valido";
    //     check=false;
    // }else{
    //     document.getElementById('error_observaciones').innerHTML = "";
    // }
    // if(!r_aficion){
    //     document.getElementById('error_aficion').innerHTML = " * No has seleccionado ninguna aficion";
    //     check=false;
    // }else{
    //     document.getElementById('error_aficion').innerHTML = "";
    // }
    //alert ("fin de la validacion en js");
    
    if (check == true) {
        if(tipo===0){
            console.log("validate 0");
            document.alta_habitacion.submit();  
            document.alta_habitacion.action="index.php?page=controller_user&op=create";
            // alert("despues del action create");
        }else if(tipo===1){
            console.log("validate 1");
            document.update_hab.submit();
            document.update_hab.action="index.php?page=controller_user&op=update";
        }
        

    }else{
        alert("mal");
    }
    
    //document.alta_habitacion.action="validate.php";
    return check;
}