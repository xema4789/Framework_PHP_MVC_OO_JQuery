var count=0;
$(document).ready(function(){
	var track_click = 0;
	$("#list_dogs_error").hide();
	var position = track_click;

		/*"modules/home/controller/controller_home.class.php?best_breed=true&position=" + position
		amigable("?module=user&function=login")*/
		$.post(amigable("?module=home&function=best_breed"), {'best_breed':true, 'position':position}, function(data, status) {
			json = JSON.parse(data);
			$(json).each(function( index,data ) {
				count++;
				var html = 	"<div class='best_breed_sel'><div class='best_breed_sel_img' style='background-image:url(http://localhost/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/view/img/back_home" + count + ".jpg);'></div>" +
							"<div class='best_breed_sel_text'><span>" + data.breed + "</span></div></div>";
				$("#best_breeds").append(html);
			});
		});

	$(document).on('click','#click_scroll',function(){
		track_click++;
		position = track_click * 2;

		if (position <= 4) {
			if (position === 4) {
				$("#click_scroll").hide();
			}
			//"modules/home/controller/controller_home.class.php?best_breed=true&position="+ position
			$.post(amigable("?module=home&function=best_breed"), {'best_breed':true,'position':position},function( data ) {
				json = JSON.parse(data);
				$(json).each(function( index,data ) {
					count++;
					var html = 	"<div class='best_breed_sel'><div class='best_breed_sel_img' style='background-image:url(http://localhost/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/view/img/back_home" + count + ".jpg);'></div>" +
								"<div class='best_breed_sel_text'><span>" + data.breed + "</span></div></div>";
					$("#best_breeds").append(html);
				});
			});
		}
	});

	$(document).on('click','.best_breed_sel',function(){
		id = $(this).text();
		//"modules/home/controller/controller_home.class.php?selected_best_breed=true&seltbreed=" + id
		$.post(amigable("?module=home&function=selected_best_breed"),{"selected_best_breed":true,"seltbreed":id}, function( data ) {
			if (data) {
				window.location.href = amigable('?module=home&function=list_dogs');
			}
		});
	});
	
	//"modules/home/controller/controller_home.class.php?load_name=true"
	$.post(amigable("?module=home&function=load_name"), {"load_name":true}, function( data ) {
		var arrname = [];
		json = JSON.parse(data);
		for (var i = 0; i < json.length; i++) {
            arrname.push(json[i].name);
        }

        $("#keyword").autocomplete({
            source: arrname,
            minLength: 1,
            select: function (event, ui) {
                var keyword = ui.item.label;
                select_auto_name(keyword);
            }
        });
	});

	$(document).on('click','.button_search',function(){
		var keyword = document.getElementById('keyword').value;
		if (keyword < 1) {
			$("#list_home").empty();
			$("#list_dogs_error").show();
		}else{
			select_auto_name(keyword);	
		}
	});

	$(document).on('click','.modalbutt',function(){
		$(".list_dogis").empty();
		var id = this.getAttribute('id');

		//"modules/home/controller/controller_home.class.php?details_list=true&idchip=" + id
		$.post(amigable("?module=home&function=details_list"),{"details_list":true, "idchip": id}, function( data ) {
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
});

function select_auto_name(keyword){
	$("#list_dogs_error").hide();
	//"modules/home/controller/controller_home.class.php?select_auto_name=true&keyword=" + keyword
	$.post(amigable("?module=home&function=select_auto_name"),{"select_auto_name":true,"keyword":keyword}, function( data ) {
		json = JSON.parse(data);
		$("#list_home").empty();
		if (json.length < 1 ) {
			$("#list_home").append("Ningun perro coincide con la busqueda");
		}else{
			$(json).each(function( index,data ) {
				var data_list = "<div class='content_data_list'>" +
									"<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
									"</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
									"<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
									"<div id='footer_list'>Nacimiento: " + data.date_birth + "</div></div>" +
								"</div>";
				$("#list_home").append(data_list);
			});
		}
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
