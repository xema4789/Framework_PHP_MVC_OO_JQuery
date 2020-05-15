// function ajax_promise(urlP, typeP, dataTypeP){
//     return new Promise((resolve, reject)=>{
//         $.ajax({
//             url:urlP,
//             type:typeP,
//             dataType: dataTypeP,
                
//           }).done(function(data){
//               alert("donde");
//               console.log(data);
//             resolve(data);
//           }).fail(function(){
//               alert("fail");
//             console.log("FAIL");
//             reject("FAIL");
//           });
//     }); 
// }





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
    // alert("sbsr");
  





    function form_register_submit(){
        
        $("#alta_login").submit(function(e){
            e.preventDefault();
            var register_serialized = $("#alta_login").serialize();
            
            user={
                "nombre":$("#re_user").val(),
                "email":$("#re_email").val(),
                "password":$("#re_password").val()

            };
            // console.log(user);

            if(validate_user()){
                ajax_succes_promise('POST',amigable("?module=login&function=register"),user).then(function(data){   //'module/login/controller/controller_login.php?&op=register&'
                console.log("DATAAAAAAAA"),
                console.log(data);
                    if(data){	
                        alert("Registro realizado correctamente");
                        // console.log(data);
                        setTimeout(' window.location.href = "'+amigable("?module=login&function=list_login")+';',1000);
                    }else{					
                        alert("Usuario en uso");
                        document.getElementById('re_user').style.borderColor = "red";
                    }
                });
            }
        });
    }
    function recover_passwd_submit(){
        $("#alta_login").submit(function(e){  
            e.preventDefault();
            user=$('#re_user').val();
            
            console.log("datos");
            console.log(user);
            //Ir a bd y buscar ese nombre, si está, cogemos el token y el email, le enviamos un email con href al controller y function recover password que lanza una vista para cambiar la contraseña a ese usuario con ese token
            ajax_succes_promise('POST',amigable("?module=login&function=recover_passwd"),user).then(function(data){
                if(data){
                    console.log("DATA:");
                    console.log(data);

                }

            });
        });
    }



     $(document).on('click', '#re_register', function(){
        form_register_submit();
     });
     $(document).on("click","#recover_passwd",function(){
        recover_passwd_submit();
    });





    $(document).on("click","#recover_passwd",function(){
        // alert("srbrw");
        if(validate_passwd()){
            var user=pass1=$('#new_passwd').val();
            ajax_succes_promise('POST',amigable("?module=login&function=new_passwd"),user).then(function(data){
                if(data){
                    console.log("DATA:");
                    console.log(data);
                    //Lanzar toastr
                    alert("contraseña cambiada correctamente");

                }

            });
        }
    });

    function validate_passwd(){
        var pass1=$('#new_passwd').val();
        var pass2=$('#new_passwd2').val();

        var check=true;
        

        if(!pass1){
            $("#error_new_passwd").html("Debe introducir la contraseña");
            check=false;
        }else{
            $("#error_new_passwd").html(" ");
        }

        if(!pass2){
            $("#error_new_passwd2").html("Debe repetir la contraseña");
            check=false;
        }else{
            $("#error_new_passwd2").html(" ");
        }

        if(check){
            if(pass1!==pass2){
                // alert("ole los caracoles");
            
                alert("Las contraseñas deben coincidir");
                check=false;
            }
        }

        return check;
        
    }






     function validate_user(){

        let re_user=validate_user_php(document.getElementById('re_user').value);
        let re_passwd=validate_password(document.getElementById('re_password').value);
        let re_email=validate_email(document.getElementById('re_email').value);

        let check=true;

        function validate_user_php(user){
            if(user){
                return true;
            }else{
                return false;
            }
        }

        function validate_password(texto){
            if(texto){
                return true;
            }else{
                return false;
            }
        }

        function validate_email(texto){
            if(texto){
                return true;
            }else{
                return false;
            }
        }


        if(!re_user){
            document.getElementById('error_re_user').innerHTML = " * El nombre de usuario no puede estar vacio";
            document.getElementById('re_user').style.borderColor = "red";
            check=false;
        }else{
            document.getElementById('error_re_user').innerHTML = " ";
        }
        if(!re_passwd){
            document.getElementById('error_re_passwd').innerHTML = " * La contraseña no puede estar vacia";
            document.getElementById('re_password').style.borderColor = "red";
            check=false;
        }else{
            document.getElementById('error_re_passwd').innerHTML = " ";
        }
        if(!re_email){
            document.getElementById('error_re_email').innerHTML = " * El email no puede estar vacio";
            document.getElementById('re_email').style.borderColor = "red";
            check=false;
        }else{
            document.getElementById('error_re_email').innerHTML = " ";
        }


        if(check){
            return true;
        }else{
            return false;
        }
     }

});