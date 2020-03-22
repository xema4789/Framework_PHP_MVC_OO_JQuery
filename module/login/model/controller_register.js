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

     $(document).on('click', '#re_register', function(){
         console.log("click detectado");
        let validate=validate_user();
        console.log("despues del validate");
        if(validate){
            console.log("dentro del if validate");
            
            document.getElementById('alta_login').submit(function(event){
                event.preventDefault();
                if(validate_user()){
                    console.log("dentro del if validate");
                    var data = $('#alta_login').serialize();

                    $.ajax({
                    url:"module/login/controller/controller_login.php?&op=register",
                    type:'POST',
                    data:data,
                    beforeSend: function(){
                        console.log(data);

                    },
                    success: function(response){
                            if(response=="ok"){
                                ////local storage set item user, tyoe , email
                                console.log("ok");
                                setTimeout(' window.location.href = "index.php?page=controller_home&op=list"; ',1000);
                            }else if(response=="okay"){
                                alert("Debes realizar el login primero");
                                setTimeout(' window.location.href = window.location.href; ',1000);
                            }else{
                                alert("Error");
                            }
                        }
                    });
                    }
                        
                });










            // alert("despues del submit");
                // console.log(event);
            // alert("Antes del ajax");
            // $.ajax({
            //     url:"module/login/controller/controller_login.php?op=register",
                
            //     type:'POST',
            //     dataType:'json',
                    
            //   }).done(function(data){
            //       alert("donde");
            //       console.log(data);
            //     resolve(data);
            //   }).fail(function(){
            //       alert("fail");
            //     console.log("FAIL");
            //     reject("FAIL");
            //   });

            //     ajax_promise("module/login/controller/controller_login.php?op=register",'POST','json').then(function(data){
            //             alert("dentro del ajax");
            //             console.log(data);
            //     });
                

            // alert("despues del ajax");

            // $('#alta_login').submit(function(event){//No entra en la funcion, Te has quedado por aqui, averiguar porque no entra
            //     console.log("OLE LOS CARACOLES");
            //     let validate=validate_user();
                // console.log(validate);
                // if(validate){
                    // ajax_promise("index.php?page=controller_login&op=register",'POST','json').then(function(data){
                    //     console.log(data);
                    // })
                }
                //Ajax_promesas
                
                

            // });
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