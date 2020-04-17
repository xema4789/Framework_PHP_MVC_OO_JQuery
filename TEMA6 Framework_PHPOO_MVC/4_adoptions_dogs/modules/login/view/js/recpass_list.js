$(document).ready(function(){
	$(document).on('click','#send_rec_pass',function(){
		result = true;
	  	$(".errorl").remove();
	  	$(".error1").remove();
  		
  		if ($("#recpass").val() === "" || $("#recpass").val() === "Introduzca la contraseña" ) {
		    $("#error_recpass").focus().after("<span class='errorl'>Introduzca la contraseña</span>");
		    return false;
		}
		if ($("#recpassr").val() === "" || $("#recpassr").val() === "Introduzca la contraseña" ) {
		    $("#error_recpassr").focus().after("<span class='errorl'>Introduzca la contraseña</span>");
		    return false;
		}

		if(result){
			$.post(amigable("?module=login&function=update_passwd"),
			{'rec_pass':JSON.stringify({'recpass':$("#recpass").val(),'recpassr':$("#recpassr").val()})},
			function(data){
				console.log(data);
				if (data) {
					Command: toastr["success"]("Cambios guardados correctamente", "Cambiando contraseña");
        			setTimeout(function(){ window.location.href = amigable("?module=home&function=list_home"); }, 3000);
				}
			},"json").fail(function(data, textStatus, errorThrown){
				if (data.responseJSON == 'undefined' && data.responseJSON === null )
                    data.responseJSON = JSON.parse(data.responseText);
                if(data.responseJSON.error.recpass)
                    $("#recpass").focus().after("<span  class='error1'>" + data.responseJSON.error.recpass + "</span>");
                if(data.responseJSON.error.recpassr)
                    $("#recpassr").focus().after("<span  class='error1'>" + data.responseJSON.error.recpassr + "</span>");
		    });
		}
	});
});
