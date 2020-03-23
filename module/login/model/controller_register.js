function ajax_promise(urlP, typeP, dataTypeP){
    return new Promise((resolve, reject)=>{
        $.ajax({
            url:urlP,
            type:typeP,
            dataType: dataTypeP,
                
          }).done(function(data){
              alert("donde");
              console.log(data);
            resolve(data);
          }).fail(function(){
              alert("fail");
            console.log("FAIL");
            reject("FAIL");
          });
    }); 
}


$(document).ready(function(){





    function form_register_submit(){
        $("#alta_login").submit(function(e){
            e.preventDefault();
            var register_serialized = $("#alta_login").serialize();
            if(validate_user()){
                $.ajax({
                    type : 'GET',
                    url  : 'module/login/controller/controller_login.php?&op=register&' + register_serialized,
                    success: function(data){	
                        if(data){	
                            alert("Registro realizado correctamente");
                            setTimeout(' window.location.href = "index.php?page=controller_home&op=list";',1000);
                        }else{					
                            alert("Usuario en uso");
                            document.getElementById('re_user').style.borderColor = "red";
                        }
                    }
                });
            }
        });
    }



     $(document).on('click', '#re_register', function(){
        form_register_submit();
     });


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
            check=false;
        }else{
            document.getElementById('error_re_user').innerHTML = " ";
        }
        if(!re_passwd){
            document.getElementById('error_re_passwd').innerHTML = " * La contraseña no puede estar vacia";
            check=false;
        }else{
            document.getElementById('error_re_passwd').innerHTML = " ";
        }
        if(!re_email){
            document.getElementById('error_re_email').innerHTML = " * El email no puede estar vacio";
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