function protecturl() {
	$.ajax({
	  type : 'GET',
	  url  : 'module/login/controller/controller_login.php?&op=control_user',
  	})
	.done(function(data){			
	  if(data=="okay"){
		setTimeout(' window.location.href = "index.php?page=controller_home&op=list"; ',1000);
	  }else if (data=="no"){
		alert("Debes realizar login");
		setTimeout(' window.location.href = window.location.href; ',1000);
	  }
	})
	.fail( function(response){console.log(response)	});
}



$(document).ready(function(){
      $.ajax({
        type : 'GET',
        url  :'module/login/controller/controller_login.php?&op=regenerate',
        dataType: 'json',
        success: function(data){
            console.log("regenerate ok");	
            console.log(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            //Aqui me salta el error
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            console.log("Error ajax regenerate");
        }       
    });






    // alert("ole los caracoles");
    // console.log("time");
    // var d = new Date();
    // var n = d.getTime();
    // console.log(n);
    // console.log(time());

    setInterval(function(){
		$.ajax({
			type : 'GET',
			url  : 'module/login/controller/controller_login.php?&op=actividad',
			success :  function(response){						
				if(response=="inactivo"){
                    

                    $.ajax({
                        url:'module/login/controller/controller_login.php?&op=log_out',
                        type: 'GET',
                        dataType: 'json',
                            
                      }).done(function(data){
                        if(data=="ok"){
                            alert("Se ha cerrado la cuenta por inactividad");
                            console.log("log out correcto");
                        }else{
                            //Error
                            console.log("fail en el log out");
                        }
                        
                      }).fail(function(){
                        console.log("FAIL");
                      });








                    logoutauto();
					//setTimeout('window.location.href = "index.php?page=controller_login&op=logout";',1000);
					
				}else{
                    console.log("activojs");
                }
			}
		});
	}, 1000);
	protecturl();
});