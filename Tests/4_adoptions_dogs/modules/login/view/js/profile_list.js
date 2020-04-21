$(document).ready(function(){
  user = localStorage.getItem('id_token');
	
	$.post(amigable("?module=login&function=print_user"),{'user':user},function(data){
		json = JSON.parse(data);
		$html_img = "<div id='img_profile'><img src='" + json[0].avatar + "' data-toggle='modal' data-target='#Modaldropzone'></div>";
		$html_info = "<div id='content_info_user'><span>Usuario: " + json[0].user + "</span><br/><span>Email: " + json[0].email + "</span><br/>" +
				"<span>Nombre: " + json[0].name + "</span><br/><span>Apellido: " + json[0].surname + "</span><br/><span>Fecha de nacimiento" + json[0].birthday + "</span></div>";

		$html_edit = "<div id='content_edit_user'>Usuario: <input type='text' value='" + json[0].user + "' readonly=''/><br/>Correo electronico: <input type='text' value='" + json[0].email + "' readonly=''/><br/>" +
					 "Nombre: <input type='text' id='pname' value='" + json[0].name + "'/><br/>Apellido: <input type='text' id='psurname' value='" + json[0].surname + "' /><br/>" +
					 "Nacimiento: <input type='text' id='pbirthday' value='" + json[0].birthday + "'/><br/><button id='submit_new_info_profile' class='" + json[0].IDuser + "'>Cambiar informacion</button></div><br/>";
		$html_ava = "<button type='button' class='btn btn-primary' data-dismiss='modal' id='upload_avatar' name='" + json[0].IDuser + "''>Save changes</button>"
    
    if (json.dog.length != 0) {
      $(json.dog).each(function( index,data ) {
        if (data.state === '0'){
          var data_list = "<div class='content_data_list'>" +
                          "<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
                          "</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
                          "<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
                          "<div id='footer_list'>Nacimiento: " + data.date_birth + "</div><button id='dog_out' class='btn btn-danger' name='" + data.chip + "'>Ocultar</button></div>" +
                          "</div>";
        }else if (data.state === '1'){
          var data_list = "<div class='content_data_list'>" +
                          "<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
                          "</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
                          "<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
                          "<div id='footer_list'>Nacimiento: " + data.date_birth + "</div><button style='background: none; border: none; color: white;'>Adoptado</button></div>" +
                          "</div>";
        }else{
          var data_list = "<div class='content_data_list'>" +
                          "<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
                          "</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
                          "<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
                          "<div id='footer_list'>Nacimiento: " + data.date_birth + "</div><button id='dog_in' class='btn btn-success' name='" + data.chip + "'>Hacer Visible</button></div>" +
                          "</div>";
        }
        $("#list_dogs").append(data_list);
      });
    }else{
      var data_list = "<div class='alert alert-danger' style='text-align: center; width: 50%; margin: 15px;'>No has dado ningun perro en adopcion</div>"
      $("#list_dogs").append(data_list);
    }

    if (json.adoptions.length != 0) {
      $(json.adoptions).each(function( index,data ) {
        var data_list = "<div class='content_data_list'>" +
                        "<div id='content_img'><img class='modalbutt' id='" + data[0].chip + "' src='" + data[0].picture + "' data-toggle='modal' data-target='#exampleModal'>" +
                        "</div><div id='content_info'><div id='header_list'><span>Nombre: " + data[0].name + "</span><br><span> Raza: " + data[0].breed + "</span></div>" +
                        "<div id='content_list'><span>Sexo: " + data[0].sex + "</span><br><span> Estatura: " + data[0].stature + "</span></div>"+
                        "<div id='footer_list'>Nacimiento: " + data[0].date_birth + "</div></div>" +
                        "</div>";
        $("#list_dogs_adop").append(data_list);
      });
    }else{
      var data_list = "<div class='alert alert-danger' style='text-align: center; width: 50%; margin: 15px;'>No has dado ningun perro en adopcion</div>"
      $("#list_dogs_adop").append(data_list);
    }
    
		$('#content_profile_img').append($html_img);
		$('#content_profile').append($html_info);
		$('#content_profile').append($html_edit);
		$('.modal-footer_').append($html_ava);

		$('#content_edit_user').hide();
    $('#list_dogs').hide();
    $('#list_dogs_adop').hide();
	});
	
	  $(document).on('click','#showinfo',function(){
      $('#list_dogs').hide();
  		$('#content_edit_user').hide();
      $('#list_dogs_adop').hide();
  		$('#content_info_user').show();
  	});
  	
  	$(document).on('click','#showeditinfo',function(){
  		$('#content_edit_user').show();
  		$('#content_info_user').hide();
      $('#list_dogs').hide();
      $('#list_dogs_adop').hide();
  	});
  	
    $(document).on('click','#show_dogs',function(){
      $('#content_edit_user').hide();
      $('#content_info_user').hide();
      $('#list_dogs_adop').hide();
      $('#list_dogs').show();
    });
    
    $(document).on('click','#show_adoptions',function(){
      $('#content_edit_user').hide();
      $('#content_info_user').hide();
      $('#list_dogs').hide();
      $('#list_dogs_adop').show();
    });
    
    $(document).on('click','#dog_in',function(){
      var chip = $(this).attr('name');
      $.post(amigable("?module=login&function=visible_dog"),{'chip':chip},function(data){
        if (data) {
          Command: toastr["success"]("Cambios guardados correctamente", "Cambiando datos");
          setTimeout(function(){ window.location.href = "."; }, 3000);
        }
      });
    });
    
    $(document).on('click','#dog_out',function(){
      var chip = $(this).attr('name');
      $.post(amigable("?module=login&function=conceal_dog"),{'chip':chip},function(data){
        if (data) {
          Command: toastr["success"]("Cambios guardados correctamente", "Cambiando datos");
          setTimeout(function(){ window.location.href = "."; }, 3000);
        }
      });
    });

    $(document).on('click','.modalbutt',function(){
      var id = this.getAttribute('id');
      details_dog(id);
      $(".list_dogis1").hide();
    });

    $(document).on('click','#pbirthday',function(){
      $( "#pbirthday" ).datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true, changeYear: true
      });
    });

  	$(document).on('click','#submit_new_info_profile',function(){
  		result = true;
	  	$(".errorl").remove();
	  	$(".errorl1").remove();
	  	user = $(this).attr('class');
	  	console.log(user);

	  	var pdate = /^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/;
  		
  		if ($("#pname").val() === "" || $("#pname").val() === "Introduce tu nombre" ) {
		    $("#pname").focus().after("<span class='errorl'>Introduce tu nombre</span>");
		    return false;
		}
		if ($("#psurname").val() === "" || $("#psurname").val() === "Introduce tu apellido" ) {
		    $("#psurname").focus().after("<span class='errorl'>Introduce tu apellido</span>");
		    return false;
		}
		if ($("#pbirthday").val() === "" || $("#pbirthday").val() === "Introduce una fecha" ) {
		   	$("#pbirthday").focus().after("<span class='errorl'>Introduce una fecha</span>");
		    return false;
		}else if (!pdate.test($("#pbirthday").val())) {
		    $("#pbirthday").focus().after("<span class='errorl'>El formato dela fecha es incorrecta</span>");
	    	return false;
		}

		if(result){
      $.post(amigable("?module=login&function=update_profile"),
      {'prof_data':JSON.stringify({'pname':$("#pname").val(),'psurname':$("#psurname").val(),'pbirthday':$("#pbirthday").val(),'user':user})}
      ,function(data){
				Command: toastr["success"]("Cambios guardados correctamente", "Cambiando datos");
        setTimeout(function(){ window.location.href = "."; }, 3000);
			},"json").fail(function(data){
		        if (data.responseJSON == 'undefined' && data.responseJSON === null )
		            data.responseJSON = JSON.parse(data.responseText);
		        if(data.responseJSON.error.pname)
		            $("#pname").focus().after("<span  class='errorl1'>" + data.responseJSON.error.pname + "</span>");
		        if(data.responseJSON.error.psurname)
		            $("#psurname").focus().after("<span  class='errorl1'>" + data.responseJSON.error.psurname + "</span>");
		         if(data.responseJSON.error.pbirthday)
		            $("#pbirthday").focus().after("<span  class='errorl1'>" + data.responseJSON.error.pbirthday + "</span>");
		    });
		}
  	});
  	
	$(document).on('click','#blogout',function(){
	    localStorage.removeItem('id_token');
	    window.location.href = amigable("?module=home&function=list_home");
  	});

  	$(document).on('click','#upload_avatar',function(){
  		user = $(this).attr('name');
	    $.post(amigable("?module=login&function=modify_avatar"),{'auser':user},function(data){
	    	if (data) {
	    		Command: toastr["success"]("Cambios guardados correctamente", "Cambiando avatar");
        	setTimeout(function(){ window.location.href = "."; }, 3000);
	    	}
	    });
  	});

  	$("#dropzone").dropzone({
        url: amigable("?module=login&function=upload_avatar"),
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "An error has occurred on the server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.svg',
        init: function () {
            this.on("success", function (file, response) {
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
            });
        },
        removedfile: function (file, serverFileName) {
            $.ajax({
                type: "POST",
                url: amigable("?module=login&function=delete_avatar"),
                data: {"filename":file.name},
                success: function (data) {
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");
                        var element;
                        if ((element = file.previewElement) !== null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            return false;
                        }
                }
            });
        }
    });//End dropzone
    Dropzone.autoDiscover = false;
});

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function details_dog(id){
  $(".list_dogis").empty();
  $(".list_dogis1").show();
  //"modules/adoptions/controller/controller_adoptions.class.php?details_list=true&idchip=" + id
  $.post(amigable("?module=adoptions&function=details_list"),{"details_list":true,"idchip":id}, function( data ) {
    json = JSON.parse(data);
    var age = calcularEdad(json[0].date_birth);
      var data_list = "<div id='content_img'><img id='modal_auto_details' src='" + json[0].picture + "'>" +
            "</div><div id='content_info'><div id='header_list'><span>Nombre: " + json[0].name + ",</span><span> Raza: " + json[0].breed + "</span></div>" +
            "<div id='content_list'><span>Sexo: " + json[0].sex + ",</span><span> Estatura: " + json[0].stature + "</span><br>" +
            "<span>Ubicacion: " + json[0].country + ", " + json[0].province + ", " + json[0].city + "</span><br><span>Teléfono: " + json[0].tlp + "</span>" +
            "<br><span>Edad: " + age +  "</span><br><span>Caracteristicas: " + json[0].cinfo + "</span></div>";
      $(".list_dogis").append(data_list);
      $(".list_dogis1").append(data_list);
  });
}

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    if (m < 0) {
      m = m.toString();
      var m = m.substring(1, m.length);
    }
    if (edad === 0) {
      return m + " Meses";
    }else{
      if (m === 0) {
        return edad + " Años";
      }else{
        return edad + " Años y " + m + " Meses";
      }
    }
}
