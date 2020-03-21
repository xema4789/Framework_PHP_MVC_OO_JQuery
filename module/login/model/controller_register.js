function ajax_promise(urlP, typeP, dataTypeP){
    return new Promise((resolve, reject)=>{
        $.ajax({
            url:urlP,
            type:typeP,
            dataType: dataTypeP,
                
          }).done(function(data){
              console.log(data);
            resolve(data);
          }).fail(function(){
            console.log("FAIL");
            reject("FAIL");
          });
    }); 
}


$(document).ready(function(){

     $(document).on('click', '#re_register', function(){
        
        // if(validate){
            
            $('#alta_login').submit(function(event){
                console.log("OLE LOS CARACOLES");
                let validate=validate_user();
                console.log(validate);
                if(validate){
                    // ajax_promise("index.php?page=controller_login&op=register",'POST','json').then(function(data){
                    //     console.log(data);
                    // })
                }
                //Ajax_promesas
                
                

            });
            // document.alta_login.submit();  
            // document.alta_login.action="index.php?page=controller_login&op=register";
        // }
        

     });

     function validate_user(){

        let re_user=validate_user_php(document.getElementById('re_user').value);
        let re_passwd=validate_password(document.getElementById('re_password').value);
        let re_email=validate_email(document.getElementById('re_email').value);

        let check=true;

        function validate_user_php(user){
            if(user){
                //Comprobar que el usuario está en uso
                // var comprobar=validate_user_register(user);
                // if(comprobar){
                    //Usuario en uso
                    return true;
                // }else{
                    //Usuario disponible
                    // return true;
                // }
                
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