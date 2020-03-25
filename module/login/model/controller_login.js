function ajax_succes_promise(typeP, urlP,serializeP){
    return new Promise((resolve,reject)=>{
        $.ajax({
            type : typeP,
            url  : urlP + serializeP,
            dataType: 'json',
            success: function(data){	
                resolve(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                //Aqui me salta el error
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                reject ("Error");
            }       
        });
    });

    
}



$(document).ready(function(){
// alert("ole los caracoles");



    $(document).on("click",'#lo_login', function(){
        form_login_submit();
    });

    function form_login_submit(){
        
        $("#alta_login").submit(function(e){
            e.preventDefault();
            var login_serialized = $("#alta_login").serialize();
            if(validate_login()){
                console.log("serialize:");
                console.log(login_serialized);
                

                //Error aqui
                ajax_succes_promise('GET','module/login/controller/controller_login.php?&op=login&', login_serialized,'json').then(function(data){
                    
                    if(data){	
                        alert("Login realizado correctamente");
                        console.log("data:");
                        console.log(data);

                        
                        // setTimeout(' window.location.href = "index.php?page=controller_home&op=list";',1000);
                    }else{					
                        alert("Usuario o contraseña incorrectos");
                        // document.getElementById('re_user').style.borderColor = "red";
                    }
                });

                











            }

        });
    }




    function validate_login(){
        var check=true;
  
        if(!document.alta_login.lo_user.value){
            document.getElementById('error_lo_user').innerHTML = " * Debe introducir el usuario";
            document.getElementById('lo_user').style.borderColor = "red";
            check=false;
        }else{
            document.getElementById('error_lo_user').innerHTML = " ";
        }
        if(!document.alta_login.lo_password.value){
            document.getElementById('error_lo_password').innerHTML = " * Debe introducir la contraseña";
            document.getElementById('lo_password').style.borderColor = "red";
            check=false;
        }else{
            document.getElementById('error_lo_password').innerHTML = " ";
        }



        if(check){
            return true;
        }else{
            return false;
        }
    }





});