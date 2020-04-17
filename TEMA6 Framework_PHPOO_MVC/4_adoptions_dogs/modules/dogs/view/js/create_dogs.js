$(document).ready(function () { 
    $(document).on('click','#submit_dog',function(){
        validate_dog();
    });

    //"modules/dogs/controller/controller_dogs.class.php?load_data=true"
   $.post(amigable("?module=dogs&function=load_data"),{"load_data":true},function(response){
        if(response.dogs===""){
            $("#dname").val('');
            $("#dchip").val('');
            $("#breed").val('');
            $("#dtlp").val('');
            $("#date_birth").val('');
            $("#date_regis").val('');
            $('#country').val('Selecciona un pais');
            $('#province').val('Selecciona una provincia');
            $('#city').val('Selecciona una ciudad');
            $("#dinfo").val('');
            var inputElements = document.getElementsByClassName('DCheckbox');
            for (var i = 0; i < inputElements.length; i++) {
                inputElements[i].checked = false;
            }
        }
    }, "json");

    $( "#date_birth" ).datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true, changeYear: true,
        maxDate: 0
    });
    
    $( "#date_regis" ).datepicker({
      dateFormat: 'mm/dd/yy',
      changeMonth: true, changeYear: true,
      minDate: 0, maxDate: "+36M"
    });
    
    //Dropzone function //////////////////////////////////
    //modules/dogs/controller/controller_dogs.class.php?upload=true
    $("#dropzone").dropzone({
        url: amigable("?module=dogs&function=upload_dog"),
        params:{'upload':true},
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
                url: amigable("?module=dogs&function=delete_dog"),
                data: {"filename":file.name,"delete":true},
                success: function (data) {
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    if (json.res === true) {
                        var element;
                        if ((element = file.previewElement) !== null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            return false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element2;
                        if ((element2 = file.previewElement) !== null) {
                            element2.parentNode.removeChild(file.previewElement);
                        } else {
                            return false;
                        }
                    }
                }
            });
        }
    });//End dropzone
    Dropzone.autoDiscover = false;

    load_countries_v1();
    $("#province").empty();
    $("#province").append('<option value="" selected="selected">Seleccione una provincia</option>');
    $("#province").prop('disabled', true);
    $("#city").empty();
    $("#city").append('<option value="" selected="selected">Seleccione una ciudad</option>');
    $("#city").prop('disabled', true);

    $("#country").change(function() {
        var country = $(this).val();
        var province = $("#province");
        var city = $("#city");

        if(country !== 'ES'){
             province.prop('disabled', true);
             city.prop('disabled', true);
             $("#province").empty();
             $("#city").empty();
        }else{
             province.prop('disabled', false);
             city.prop('disabled', false);
             load_provinces_v1();
        }//fi else
    });
    
    $("#province").change(function() {
        var prov = $(this).val();
        if(prov > 0){
            load_cities_v1(prov);
        }else{
            $("#city").prop('disabled', false);
        }
    });
});

function validate_dog(){
    result = true;
    var c = document.getElementById('country');
    var countrytext = c.options[c.selectedIndex].text;

    var sex = $('input[name="sex"]:checked').val();
    var stature = $('input[name="stature"]:checked').val();
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;

    var pnara = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
    var pchip = /^[0-9]{6}[A-Z]{1}$/;
    var ptlp = /^[0-9]{9}$/;
    var pdesc = /^[0-9A-Za-z\s]{20,100}$/;
    var pdate = /^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/;

    $(".error").remove();

    if ($("#dname").val() === "" || $("#dname").val() === "Introduce un nombre" ){
      $("#dname").focus().after("<span class='error'>Introduce un nombre</span>");
      return false;
    }else if(!pnara.test($("#dname").val())){
      $("#dname").focus().after("<span class='error'>El nombre tiene que tener mas de 3 caracteres(Solo caracteres)</span>");
      return false;
    }

    if ($("#dchip").val() === "" || $("#dchip").val() === "Introduce el chip") {
        $("#dchip").focus().after("<span class='error'>Introduce el chip</span>");
        return false;
    } else if (!pchip.test($("#dchip").val())) {
        $("#dchip").focus().after("<span class='error'>Formato incorrecto de chip(123456A)</span>");
        return false;
    }
    
    if ($("#breed").val() === "" || $("#breed").val() === "Introduce la raza del perro") {
        $("#breed").focus().after("<span class='error'>Introduce la raza del perro</span>");
        return false;
    } else if (!pnara.test($("#breed").val())) {
        $("#breed").focus().after("<span class='error'>La raza tiene que tener mas de 3 caracteres(Solo caracteres)</span>");
        return false;
    }
    
    if ($("#dtlp").val() === "" || $("#dtlp").val() === "Introduce un telefono movil") {
        $("#dtlp").focus().after("<span class='error'>Introduce un telefono movil</span>");
        return false;
    } else if (!ptlp.test($("#dtlp").val())) {
        $("#dtlp").focus().after("<span class='error'>Formato incorrecto de telefono(123456789)</span>");
        return false;
    }

    if ($("#date_birth").val() === "") {
        $("#date_birth").focus().after("<span class='error'>Introduce una fecha</span>");
        return false;
    } else if (!pdate.test($("#date_birth").val())) {
        $("#date_birth").focus().after("<span class='error'>Formato incorrecto de la fecha</span>");
        return false;
    }

    if ($("#date_regis").val() === "") {
        $("#date_regis").focus().after("<span class='error'>Introduce una fecha</span>");
        return false;
    } else if (!pdate.test($("#date_regis").val())) {
        $("#date_regis").focus().after("<span class='error'>Formato incorrecto de la fecha</span>");
        return false;
    }

    if ($("#country").val() === "" || $("#country").val() === "Select country" || $("#country").val() === null) {
        $("#country").focus().after("<span class='error'>Selecciona un pais</span>");
        return false;
    }

    if (province === "" || province === "Select province") {
        $("#province").focus().after("<span class='error'>Selecciona una provincia o selecciona España como pais</span>");
        return false;
    }

    if (city === "" || city === "Select city") {
        $("#city").focus().after("<span class='error'>Selecciona una ciudad</span>");
        return false;
    }

    if ($("#dinfo").val() === "" || $("#dinfo").val() === "Introduce una descripcion") {
        $("#dinfo").focus().after("<span class='error'>Introduce una descripcion</span>");
        return false;
    } else if (!pdesc.test($("#dinfo").val())) {
        $("#dinfo").focus().after("<span class='error'>La descripcion tiene que estar entre 20 y 100 caracteres</span>");
        return false;
    }
    
    var dcheckinfo = document.getElementsByClassName('DCheckbox');
    var cinfo = [];
    $( dcheckinfo ).each(function( index,data ) {
        if (data.checked){
            cinfo.push(data.value);
        }
    });

    var p = document.getElementById('province');
    var provincetext = p.options[p.selectedIndex].text;

    if (cinfo.length === 0) {
        $("#error_cinfo").focus().after("<span class='error'>Introduce una caracteristica</span>");
        return false;
    }
    
    if (result) {
        var data = {"dname": $("#dname").val(), "dchip": $("#dchip").val(), "breed": $("#breed").val(), "dtlp": $("#dtlp").val(), "cinfo": cinfo, "sex": sex, "stature": stature, "date_birth": $("#date_birth").val(), "date_regis": $("#date_regis").val(), "country": countrytext, "province": provincetext, "city": city, "dinfo": $("#dinfo").val(),"token":localStorage.getItem('id_token')};
        var data_dog_json = JSON.stringify(data);

        //'modules/dogs/controller/controller_dogs.class.php'
        $.post(amigable("?module=dogs&function=json_dog"),{json_dog:data_dog_json}, function (response){
            if(response.success){
              window.location.href = response.redirect;
            }
        },"json").fail(function(xhr, textStatus, errorThrown){
            console.log(xhr);
            $(".error1").remove();

            if (xhr.responseJSON == 'undefined' && xhr.responseJSON === null )
                xhr.responseJSON = JSON.parse(xhr.responseText);

            if(xhr.responseJSON.error.dname)
                $("#error_dname").focus().after("<span  class='error1'>" + xhr.responseJSON.error.dname + "</span>");

            if(xhr.responseJSON.error.dchip)
                $("#error_dchip").focus().after("<span  class='error1'>" + xhr.responseJSON.error.dchip + "</span>");

            if(xhr.responseJSON.error.breed)
                $("#error_breed").focus().after("<span  class='error1'>" + xhr.responseJSON.error.breed + "</span>");

            if(xhr.responseJSON.error.dtlp)
                $("#error_dtlp").focus().after("<span  class='error1'>" + xhr.responseJSON.error.dtlp + "</span>");

            if(xhr.responseJSON.error.cinfo)
                $("#error_cinfo").focus().after("<span  class='error1'>" + xhr.responseJSON.error.cinfo + "</span>");

            if(xhr.responseJSON.error.sex)
                $("#error_sex").focus().after("<span  class='error1'>" + xhr.responseJSON.error.sex + "</span>");

            if(xhr.responseJSON.error.stature)
                $("#error_stature").focus().after("<span  class='error1'>" + xhr.responseJSON.error.stature + "</span>");

            if(xhr.responseJSON.error.date_birth)
                $("#error_date_birth").focus().after("<span  class='error1'>" + xhr.responseJSON.error.date_birth + "</span>");

            if(xhr.responseJSON.error.date_regis)
                $("#error_date_regis").focus().after("<span  class='error1'>" + xhr.responseJSON.error.date_regis + "</span>");

            if(xhr.responseJSON.error.dinfo)
                $("#error_dinfo").focus().after("<span  class='error1'>" + xhr.responseJSON.error.dinfo + "</span>");

            if(xhr.responseJSON.error_pic)
                $("#error_pic").focus().after("<span  class='error1'>" + xhr.responseJSON.error_pic + "</span>");
        });
    }
}

function load_countries_v1() {
    //"modules/dogs/controller/controller_dogs.class.php?load_country=true"
    $.post(amigable("?module=dogs&function=load_country"),{"load_country":true}, function( response ) {
            if(response === 'error'){
                load_countries_v2(amigable("?module=resources&function=ListOfCountryNamesByName.json"));
            }else{
                load_countries_v2(amigable("?module=dogs&function=load_country"),{'load_country':true}); //oorsprong.org
            }
    }).fail(function(response) {
        load_countries_v2(amigable("?module=resources&function=ListOfCountryNamesByName.json"));
    });
}

function load_countries_v2(cad,post_data) {
    $.post(cad, post_data, function(data) {
        var json = JSON.parse(data);
      $("#country").empty();
      $("#country").append('<option value="" selected="selected">Seleccione un pais</option>');

      $.each(json, function (i, value) {
        $("#country").append("<option value='" + value.sISOCode + "'>" + value.sName + "</option>");
      });
    })
    .fail(function() {
        alert( "error load_countries" );
    });
}

function load_provinces_v1() {
    //"modules/dogs/controller/controller_dogs.class.php?load_provinces=true"
    $.post(amigable("?module=dogs&function=load_provinces"),{"load_provinces":true}, function( response ) {
        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Selecciona una provincia</option>');

        var json = JSON.parse(response);
        var provinces=json.provinces;
        if(provinces === 'error'){
            load_provinces_v2();
        }else{
            for (var i = 0; i < provinces.length; i++) {
                $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
            }
        }
    }).fail(function(response) {
        load_provinces_v2();
    });
}

function load_provinces_v2() {
    $.get(amigable("?module=resources&function=provinciasypoblaciones.xml"), function (xml) {
        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Selecciona una provincia</option>');

        $(xml).find("provincia").each(function () {
            var id = $(this).attr('id');
            var name = $(this).find('nombre').text();
            $("#province").append("<option value='" + id + "'>" + name + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_provinces" );
    });
}

function load_cities_v2(prov) {
    $.get(amigable("?module=resources&function=provinciasypoblaciones.xml"), function (xml) {
        $("#city").empty();
        $("#city").append('<option value="" selected="selected">Seleccione una ciudad</option>');

        $(xml).find('provincia[id=' + prov + ']').each(function(){
            $(this).find('localidad').each(function(){
                 $("#city").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
            });
        });
    })
    .fail(function() {
        alert( "error load_cities" );
    });
}

function load_cities_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = { idPoblac : prov  };
    //"modules/dogs/controller/controller_dogs.class.php"
    $.post(amigable("?module=dogs&function=load_cities"), datos, function(response) {
        var json = JSON.parse(response);
        var cities=json.cities;

        $("#city").empty();
        $("#city").append('<option value="" selected="selected">Selecciona una ciudad</option>');
        
        if(cities === 'error'){
            load_cities_v2(prov);
        }else{
            for (var i = 0; i < cities.length; i++) {
                $("#city").append("<option value='" + cities[i].poblacion + "'>" + cities[i].poblacion + "</option>");
            }
        }
    })
    .fail(function() {
        load_cities_v2(prov);
    });
}
