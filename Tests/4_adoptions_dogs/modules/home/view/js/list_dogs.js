$(document).ready(function(){ 
	
	//"modules/home/controller/controller_home.class.php?get_breed=true"
	$.post(amigable("?module=home&function=get_breed"), {"get_breed":true}, function( data ) {
		//"modules/home/controller/controller_home.class.php?load_list=true&rlt_breed=" + data + "&number=0"
		$.post(amigable("?module=home&function=load_list"),{"load_list":true,"rlt_breed":data,"number":0}, function( data ) {
			json = JSON.parse(data);
			$(json).each(function( index,data ) {
				var data_list = "<div class='content_data_list'>" +
									"<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
									"</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
									"<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
									"<div id='footer_list'>Nacimiento: " + data.date_birth + "</div></div>" +
								"</div>";
	  			$("#list_dogs").append(data_list);
			});
		});
	});
	
	$(document).on('click','.modalbutt',function(){
		$(".list_dogis").empty();
		var id = this.getAttribute('id');
		//"modules/home/controller/controller_home.class.php?details_list=true&idchip=" + id
		$.post(amigable("?module=home&function=details_list"),{"details_list":true,"idchip":id}, function( data ) {
			json = JSON.parse(data);
			var age = calcularEdad(json[0].date_birth);
		  	var data_list = "<div id='content_img'><img class='modalbutt' id='" + json[0].chip + "' src='" + json[0].picture + "'>" +
							"</div><div id='content_info'><div id='header_list'><span>Nombre: " + json[0].name + ",</span><span> Raza: " + json[0].breed + "</span></div>" +
							"<div id='content_list'><span>Sexo: " + json[0].sex + ",</span><span> Estatura: " + json[0].stature + "</span><br>" +
							"<span>Ubicacion: " + json[0].country + ", " + json[0].province + ", " + json[0].city + "</span><br><span>Teléfono: " + json[0].tlp + "</span>" +
							"<br><span>Edad: " + age +  "</span><br><span>Caracteristicas: " + json[0].cinfo + "</span></div>";
  			$(".list_dogis").append(data_list);
		});
	});

	$(document).on('click','#returnhome',function(){
		window.location.href = amigable('?module=home&function=list_home');
	});

});

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
