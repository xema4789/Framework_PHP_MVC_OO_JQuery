$(document).ready(function(){ 
	$("#list_dogs_error").hide();

	if (getCookie("search")) {
        var keyword=getCookie("search");
        first_list(keyword,0);
		bootp_list(keyword);
		setCookie("search","",1)
    } else {
        first_list('%',0);
		bootp_list('%');
    }
    
    //"modules/adoptions/controller/controller_adoptions.class.php?all_breeds=true"
	$.post(amigable("?module=adoptions&function=all_breeds"),{"all_breeds":true}, function( data ) {
		var json = JSON.parse(data);
		var all_breeds = new Array();
		for (var i = 0; i < json.length; i++) {
            all_breeds.push(json[i].breeds);
        }
        $("#keyword").autocomplete({
            source: all_breeds,
            minLength: 1,
            select: function (event, ui) {
                var keyword = ui.item.label;
                setCookie("search", keyword, 1);
        		location.reload(true);
            }
        });
	});

	$("#search_adoption").submit(function (e) {
        var keyword = document.getElementById('keyword').value;
        if (keyword)
        	setCookie("search", keyword, 1);
        location.reload(true);
        e.preventDefault(); 
    });

	$(document).on('click','.button_search',function(){
		var keyword = document.getElementById('keyword').value;
		if (!keyword) {
			$(".pagination").empty();
			$("#list_dogs").empty();
			$("#list_dogs_error").show();
		}else{
            setCookie("search", keyword, 1);
            location.reload(true);
		}
	});

	$(document).on('click','.modalbutt',function(){
		var id = this.getAttribute('id');
		details_dog(id);
		$(".list_dogis1").hide();
	});

	$(document).on('click','#adopt_dog',function(){
		var chip = this.getAttribute('name');
		var token = localStorage.getItem("id_token");
		$.post(amigable("?module=adoptions&function=adoption_dog"),{"all_info":JSON.stringify({'chip':chip,'token':token})}, function( data ) {
			if (data) {
				Command: toastr["success"]("La adopcion se ha realizado correctamente", "Adopcion correcta");
        		setTimeout(function(){ window.location.href = "."; }, 3000);
			}else{
				Command: toastr["error"]("La adopcion no se ha realizado", "Adopcion fallida");
        		setTimeout(function(){ window.location.href = "."; }, 3000);
			}
		});
	});

});

function first_list(flt_breed,number){
	$("#list_dogs").empty();
	//"modules/adoptions/controller/controller_adoptions.class.php?load_list=true&rlt_breed=" + flt_breed + "&number=" + number
	$.post(amigable("?module=adoptions&function=load_list"),{"load_list":true,"rlt_breed":flt_breed,"number":number}, function( data ) {
		//console.log(data);
		json = JSON.parse(data);
		console.log(json);
		console.log(json.length);
		if (json.length === 0) {
				var data_list = "<div class='content_data_list'>" + 'No Data' + "</div>";
		  		$("#list_dogs").append(data_list);
		}else{
			if (json.length < 2) {
					details_dog(json[0].chip);
			}else{
				$(json).each(function( index,data ) {
					var data_list = "<div class='content_data_list'>" +
											"<div id='content_img'><img class='modalbutt' id='" + data.chip + "' src='" + data.picture + "' data-toggle='modal' data-target='#exampleModal'>" +
											"</div><div id='content_info'><div id='header_list'><span>Nombre: " + data.name + "</span><br><span> Raza: " + data.breed + "</span></div>" +
											"<div id='content_list'><span>Sexo: " + data.sex + "</span><br><span> Estatura: " + data.stature + "</span></div>"+
											"<div id='footer_list'>Nacimiento: " + data.date_birth + "</div></div>" +
										"</div>";
			  		$("#list_dogs").append(data_list);
				});
			}
		}
	});
}

function bootp_list(flt_breed){
	//"modules/adoptions/controller/controller_adoptions.class.php?number_breeds=true&num_breed=" + flt_breed
	$.post(amigable("?module=adoptions&function=number_breeds"),{"number_breeds":true,"num_breed":flt_breed}, function( data ) {
		json = JSON.parse(data);
		var total_page = json[0].num / 6;
		total_page = Math.ceil(total_page);
		$(".pagination").empty();
	    $(".pagination").bootpag({
	        total: total_page,
	        page: 1,
	        maxVisible: 3,
	        next: 'next',
	        prev: 'prev'
	    }).on("page", function (e, num) {
	        e.preventDefault();
	        number = (num - 1) * 6;
	        first_list(flt_breed,number);
	    });
	}).fail(function (xhr) {
	    if(xhr.status  === 404){
	    	console.log("Mal404");
	        //$("#results").load("modules/products/controller/controller_products.class.php?view_error=false");
	    }else{
	        //$("#results").load("modules/products/controller/controller_products.class.php?view_error=true");
	        console.log("Mal");
	    }
	});
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
						"<br><span>Edad: " + age +  "</span><br><span>Caracteristicas: " + json[0].cinfo + "</span><div class='modal-footer_'></div></div>";
			$(".list_dogis").append(data_list);
			$(".list_dogis1").append(data_list);

			if (localStorage.getItem("id_token")) {
				$('.modal-footer_').empty();
				$html_adop = "<button type='button' class='btn btn-primary' data-dismiss='modal' id='adopt_dog' name='" + id + "''>Adoptar</button>"
				$('.modal-footer_').append($html_adop);
			}
	});
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return 0;
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
