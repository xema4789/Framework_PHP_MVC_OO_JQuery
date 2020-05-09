$(document).ready(function(){
    function ajax_succes_promise(type, url, user){
       
        return new Promise((resolve,reject)=>{
            $.ajax({
                type : type,
                url  : url,
                data:{'okay':true,'user':user},
                dataType:'json',
                success: function(data){	
                    resolve(data);
                }
            });
        });
    
        
    }


    $(document).on("click",'#lo_login', function(){
        form_login_submit();
    });

    function form_login_submit(){
        
        $("#alta_login").submit(function(e){
            e.preventDefault();
            var login_serialized = $("#alta_login").serialize();


            user={
                "nombre":$("#lo_user").val(),
                "password":$("#lo_password").val()
            };
           



            if(validate_login()){
                console.log("serialize:");
                console.log(login_serialized);
                

                //Error aqui
                ajax_succes_promise('POST',amigable("?module=login&function=login"),user).then(function(data){ 

                    if(data){	
                        alert("Login realizado correctamente");
                        console.log("data:");
                        console.log(data);


                        //Pongo el carrito a 0 cuando se loguea (temporal)
                        localStorage.setItem('carrito',"");
                        // localStorage.setItem('Lujo',0);
                        // localStorage.setItem('Asiatica',0);

                        
                        // setTimeout(' window.location.href = "index.php?page=controller_home&op=list";',1000);
                    }else{					
                        alert("Usuario o contraseña incorrectos");
                        console.log(data);
                        // document.getElementById('re_user').style.borderColor = "red";
                    }
                });

                











            }

        });
    }




    // $(document).on("click","#desconectar",function(){
    //     alert("desconectar");
    // });



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